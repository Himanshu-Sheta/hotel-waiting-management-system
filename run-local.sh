#!/bin/bash
cd "$(dirname "$0")"
echo "🚀 Starting Hotel Waiting Management System on localhost..."
docker compose up -d --build
echo ""
echo "✅ Project is live at: http://localhost:8080"
echo "✅ Admin dashboard:   http://localhost:8080/admin"
echo ""
open "http://localhost:8080" 2>/dev/null || true
