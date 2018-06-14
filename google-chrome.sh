#!/usr/bin/env bash

google-chrome \
  --auth-server-whitelist="10.5.0.4,http-service.example.com" \
  --auth-negotiate-delegate-whitelist="10.5.0.4,http-service.example.com" \
  &> /dev/null &
