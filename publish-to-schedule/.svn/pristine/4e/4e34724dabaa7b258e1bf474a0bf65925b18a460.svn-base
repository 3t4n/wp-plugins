#!/usr/bin/env bash
SVN_REPOSITORY=publish-to-schedule
SVN_USERNAME=alexbenfica


rm -rf ../svn

# 1. Clone complete SVN repository to separate directory
svn co https://plugins.svn.wordpress.org/$SVN_REPOSITORY ../svn

# echo 'inside initial dir'
# pwd
# ls -las


# 2. Copy git repository contents to SNV trunk/ directory
cp -R ./* ../svn/trunk/

# 3. Switch to SVN repository
cd ../svn/trunk/

# echo 'inside SVN trunk'
# pwd
# ls -las

# 4. Move assets/ to SVN /assets/
mv ./assets/* ../assets/

# 5. Clean up unnecessary files from trunj
rm -rf ./.git/
rm -rf ./deploy
rm -rf ./build
rm -rf ./assets/assets
rm -rf ./assets/*.psd
rm -rf ./nbproject/
rm -rf ./.travis.yml

echo 'SVN trunk - after removing files and folders'
# pwd
# ls -las

# 6. Go to SVN repository root
cd ../

echo 'SVN root'
pwd
# ls -las assets

# 5. Clean up unnecessary files
svn delete -q deploy
svn delete -q build
svn delete -q nbproject
svn delete -q assets/assets

# 7. Add all new files
svn add --force * --auto-props --parents --depth infinity -q

# 8. Push SVN tag
svn ci --message "Updating to version 4.5.1" --username $SVN_USERNAME --password $SVN_PASSWORD --non-interactive