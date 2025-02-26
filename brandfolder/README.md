# integration-wordpress

## Prerequisites

- docker
- NodeJS v12+

## Getting started

### Setup

1. Run `npm -g i @wordpress/env` (only do this the first time you start the app)
1. Run `wp-env start`
1. Navigate to `http://localhost:8888/wp-admin` and login with username `admin` and password `password`
1. On shutdown run `wp-env destroy` to remove your Wordpress instance.

If you make changes to the application while running, return to CLI and run `npm run build` to apply updates.

## Publishing setup
- Install homebrew https://brew.sh/ `/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"`
- Install svn http://subversion.apache.org/packages.html#osx `brew install subversion`

## Publish
- Pull the latest code
- Update version number in  `brandfolder-integration.php`, `package.json`
- Update version in two places in `readme.txt`; at the top of the file for `Stable tag:`, and in the `== Changelog ==` section.
- Create a temporary dir (outside the git repo) `mkdir wp_tmp`
- Go to that dir `cd wp_tmp`
- Clone the existing WP SVN repo `svn checkout https://plugins.svn.wordpress.org/brandfolder`
- `cd brandfolder/trunk/`
- Remove old files `svn delete *`
- Put all the new files in the trunk `cp -R ../../../integration-wordpress/* .`
- Install the dependencies `npm install`
- Generate the build files `npm run build`
- Eliminate dependencies `rm -rf node_modules`
- Confirm `src/node_modules` has been deleted. Pushing the commit will fail if not.
- Add everything else to SVN `svn add *`
- Push to server: `svn commit -m "<commit message>" --username brandfolder`
- Publish by copying server trunk as a new tag (MAKE SURE TO UPDATE THE ACTUAL TAG NUMBER FROM 5.0.6) e.g. `svn copy https://plugins.svn.wordpress.org/brandfolder/trunk https://plugins.svn.wordpress.org/brandfolder/tags/5.0.6 -m "Release 5.0.6" --username brandfolder`
- When prompted, enter the password from https://smartsheet.secretservercloud.com/app/#/secrets/1885/general
