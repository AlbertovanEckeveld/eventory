#!/bin/bash

# Script validation checks
if [ "$(id -u)" != "0"]; then
    echo "Deze script moet met root geopend worden." 1>&2
    exit 1
fi

# --------- Installs ---------

# Run a update and upgrade
apt-get -y update && apt-get -y upgrade;

# Remove any pending packages
apt-get -y autoremove;

