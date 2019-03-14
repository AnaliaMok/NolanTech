#!/bin/bash

cd contenta && lando rebuild -y
cd gridsome && lando rebuild -y
cd gridsome && lando develop