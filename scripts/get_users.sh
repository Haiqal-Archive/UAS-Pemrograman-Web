#!/bin/zsh
set -euo pipefail

DB_CONTAINER=${DB_CONTAINER:-rusthub_db}
DB_NAME=${DB_NAME:-rusthub_db}
DB_USER=${DB_USER:-root}
DB_PASS=${DB_PASS:-root}
DEFAULT_QUERY="SELECT id, nama, username, role, created_at FROM users;"
QUERY=${1:-$DEFAULT_QUERY}

if docker ps --format '{{.Names}}' | grep -q "^${DB_CONTAINER}$"; then
  docker exec -i "$DB_CONTAINER" mysql -u"$DB_USER" -p"$DB_PASS" -D "$DB_NAME" -e "$QUERY"
else
  if command -v mysql >/dev/null 2>&1; then
    mysql -h 127.0.0.1 -P 3306 -u"$DB_USER" -p"$DB_PASS" -D "$DB_NAME" -e "$QUERY"
  else
    echo "Error: Container '$DB_CONTAINER' not running and 'mysql' client not found." >&2
    exit 1
  fi
fi
