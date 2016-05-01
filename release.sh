#!/bin/bash
# Script to release the plusone plugin for dotclear. It takes one parameter,
# the version string and produces one zip file in the dotclear plugin format.
readonly VERSION=$1
readonly PLUGIN=plusone

if [ -z "${VERSION}" ]; then
  echo "Needs a version string as first parameter." 1>&2
  exit 1
fi

set -e

echo "Releasing ${VERSION}..." 1>&2

rm -rf "${PLUGIN}"
mkdir "${PLUGIN}"

# Simple files.
for f in _admin.php _public.php index.php LICENSE icon.png locales; do
  ln -s "../${f}" "${PLUGIN}"
done

# File containing version.
sed "s/'dev'/'${VERSION}'/" _define.php > "${PLUGIN}"/_define.php

PLUGIN_ARCHIVE="plugin-${PLUGIN}-${VERSION}.zip"
rm -f "${PLUGIN_ARCHIVE}"
zip -r "${PLUGIN_ARCHIVE}" "${PLUGIN}"
rm -rf "${PLUGIN}"
