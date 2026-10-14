#!/bin/bash
cd "$(dirname "$0")"
echo "🛑 Stopping Hotel Waiting Management System..."
docker compose down
echo "✅ Stopped."
