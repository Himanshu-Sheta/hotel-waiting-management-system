/**
 * Hotel & Restaurant Waiting Management System
 * Interactive Client Queue Engine (ES6+)
 */

class QueueManager {
    constructor(apiEndpoint = '/api/queue.php') {
        this.apiEndpoint = apiEndpoint;
        this.activeQueue = [];
        this.subscribers = [];
        this.pollInterval = null;
    }

    init() {
        this.bindEvents();
        this.fetchCurrentQueue();
        this.startRealtimePolling(5000);
    }

    bindEvents() {
        const form = document.getElementById('waiting-registration-form');
        if (form) {
            form.addEventListener('submit', (e) => this.handleRegistration(e));
        }
    }

    async fetchCurrentQueue() {
        try {
            const response = await fetch(`${this.apiEndpoint}?action=list_active`);
            if (!response.ok) throw new Error(`HTTP error ${response.status}`);
            
            const data = await response.json();
            this.activeQueue = data.entries || [];
            this.renderQueueList();
            this.notifySubscribers();
        } catch (error) {
            console.error('[QueueManager] Failed to load queue:', error);
            this.renderError('Unable to synchronize queue status. Retrying...');
        }
    }

    async handleRegistration(event) {
        event.preventDefault();
        const guestName = document.getElementById('guest-name').value.trim();
        const partySize = parseInt(document.getElementById('party-size').value, 10);
        const contactNumber = document.getElementById('contact-phone').value.trim();
        const notes = document.getElementById('special-requests')?.value || '';

        if (!guestName || isNaN(partySize) || partySize <= 0) {
            alert('Please provide a valid guest name and party size.');
            return;
        }

        const payload = {
            guest_name: guestName,
            party_size: partySize,
            phone: contactNumber,
            special_requests: notes,
            timestamp: new Date().toISOString()
        };

        try {
            const res = await fetch(`${this.apiEndpoint}?action=add_guest`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });
            const result = await res.json();
            
            if (result.success) {
                alert(`Registered! Your queue ticket number is #${result.ticket_number}. Estimated wait: ${result.estimated_wait_minutes} mins.`);
                document.getElementById('waiting-registration-form').reset();
                this.fetchCurrentQueue();
            } else {
                alert(`Registration failed: ${result.message}`);
            }
        } catch (err) {
            console.error('[QueueManager] Error adding guest:', err);
        }
    }

    renderQueueList() {
        const container = document.getElementById('queue-display-container');
        if (!container) return;

        if (this.activeQueue.length === 0) {
            container.innerHTML = '<div class="empty-state">No guests currently waiting. Walk-in seating available!</div>';
            return;
        }

        container.innerHTML = this.activeQueue.map((item, index) => `
            <div class="queue-card ${item.priority ? 'priority' : ''}" data-ticket="${item.ticket_id}">
                <div class="ticket-header">
                    <span class="ticket-badge">#${item.ticket_id}</span>
                    <span class="party-count">👥 ${item.party_size} Guests</span>
                </div>
                <div class="guest-info">
                    <strong>${this.escapeHtml(item.guest_name)}</strong>
                    <span class="wait-time">⏳ ~${item.estimated_wait} mins</span>
                </div>
                <div class="queue-status-tag status-${item.status.toLowerCase()}">${item.status}</div>
            </div>
        `).join('');
    }

    startRealtimePolling(intervalMs = 5000) {
        if (this.pollInterval) clearInterval(this.pollInterval);
        this.pollInterval = setInterval(() => this.fetchCurrentQueue(), intervalMs);
    }

    escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    subscribe(callback) {
        this.subscribers.push(callback);
    }

    notifySubscribers() {
        this.subscribers.forEach(cb => cb(this.activeQueue));
    }
}

// Export for module or browser window
if (typeof window !== 'undefined') {
    window.QueueManager = QueueManager;
}
