#!/usr/bin/env bash
#main protocol
echo "adjusting package in main proto"
find ./ -type f -name "protocol.proto" -exec sed -i'' -e 's/package core/package attrace.connector.protocol.core/g' {} +
find ./ -type f -name "contractprotocol.proto" -exec sed -i'' -e 's/package contractprotocol/package attrace.connector.protocol.contractprotocol/g' {} +
find ./ -type f -name "integrations.proto" -exec sed -i'' -e 's/package integrations/package attrace.connector.protocol.integrations/g' {} +

echo "adjusting contract import"
find ./ -type f -name "protocol.proto" -exec sed -i'' -e 's/contractprotocol\/contractprotocol.proto"/contractprotocol.proto"/g' {} +

echo "generate main protocol"
protoc --php_out=./ ./protocol.proto
echo "generate contractprotocol"
protoc --php_out=./ ./contractprotocol.proto

echo "generate integration"
protoc --php_out=./ ./integrations.proto

echo "Start moving and adjusting";

echo "Move Core"
rm -rf ./Core
mv ./Attrace/Connector/Protocol/Core .

echo "Move Contractprotocol"
rm -rf ./Contractprotocol
mv ./Attrace/Connector/Protocol/Contractprotocol .

echo "Move integrations"
rm -rf ./Integrations
mv ./Attrace/Connector/Protocol/Integrations .

rm -rf ./Attrace

echo "Replace GPBMetadata namespace"
find ./GPBMetadata -type f -name "*.php" -exec sed -i'' -e 's/namespace GPBMetadata/namespace Attrace\\Connector\\Protocol\\GPBMetadata/g' {} +
find ./GPBMetadata -type f -name "*.php" -exec sed -i'' -e 's/\\GPBMetadata\\/\\Attrace\\Connector\\Protocol\\GPBMetadata\\/g' {} +


echo "Adjust Contractprotocol"
find ./Contractprotocol -type f -name "*.php" -exec sed -i'' -e 's/\\GPBMetadata\\Contractprotocol/\\Attrace\\Connector\\Protocol\\GPBMetadata\\Contractprotocol/g' {} +

echo "Adjust Integrations"
find ./Integrations -type f -name "*.php" -exec sed -i'' -e 's/\\GPBMetadata\\Integrations/\\Attrace\\Connector\\Protocol\\GPBMetadata\\Integrations/g' {} +

echo "Adjust Core"
find ./Core -type f -name "*.php" -exec sed -i'' -e 's/GPBMetadata/Attrace\\Connector\\Protocol\\GPBMetadata/g' {} +

echo "Clean up temp files"
find . -type f -a -name '*.php-e' -print0 | xargs -0 rm
find . -type f -a -name '*.proto-e' -print0 | xargs -0 rm

