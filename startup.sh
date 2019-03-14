#!/bin/bash

cd contenta && lando start
cd ../gridsome && lando start
lando develop