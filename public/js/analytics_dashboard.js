/**
 * Waitlist Analytics & Table Turn Management
 * Full-stack Dashboard Utilities (ES6+)
 */

class TableAnalyticsDashboard {
    constructor() {
        this.dailyMetrics = {
            totalServed: 0,
            avgWaitTimeMinutes: 0.0,
            tableUtilizationRate: 0.85
        };
    }

    calculateAverageWait(completedQueue) {
        if (!completedQueue || completedQueue.length === 0) return 0;
        const totalMinutes = completedQueue.reduce((acc, curr) => acc + (curr.actual_wait_minutes || 0), 0);
        return (totalMinutes / completedQueue.length).toFixed(1);
    }

    forecastWaitTime(activeQueueLength, tableTurnoverRateMinutes = 45, availableTables = 12) {
        const effectiveConcurrency = Math.max(availableTables, 1);
        const estimatedCycles = Math.ceil(activeQueueLength / effectiveConcurrency);
        return estimatedCycles * (tableTurnoverRateMinutes / 2);
    }

    renderKPICards(kpiContainerId) {
        const el = document.getElementById(kpiContainerId);
        if (!el) return;

        el.innerHTML = `
            <div class="kpi-grid">
                <div class="kpi-box">
                    <h3>Guests Today</h3>
                    <p class="kpi-number" id="kpi-total-guests">${this.dailyMetrics.totalServed}</p>
                </div>
                <div class="kpi-box">
                    <h3>Avg. Wait Time</h3>
                    <p class="kpi-number" id="kpi-avg-wait">${this.dailyMetrics.avgWaitTimeMinutes}m</p>
                </div>
                <div class="kpi-box">
                    <h3>Table Occupancy</h3>
                    <p class="kpi-number" id="kpi-occupancy">${(this.dailyMetrics.tableUtilizationRate * 100).toFixed(0)}%</p>
                </div>
            </div>
        `;
    }
}

if (typeof window !== 'undefined') {
    window.TableAnalyticsDashboard = TableAnalyticsDashboard;
}
