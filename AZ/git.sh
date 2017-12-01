#!/bin/bash

gitrepo=https://github.com/PS6/C.git
token=<generate in developer settings, hooks to be allowed>
rgname=ps6c_RG
webappname=ps6c

# Create a resource group.
az group create --location westeurope --name $rgname
# Create an App Service plan in `FREE` tier.
az appservice plan create --name $webappname --resource-group $rgname --sku FREE

# Create a web app.
az webapp create --name $webappname --resource-group $rgname --plan $webappname

# Configure continuous deployment from GitHub.
# --git-token parameter is required only once per Azure account (Azure remembers token).
az webapp deployment source config --debug --name $webappname --resource-group $rgname \
--repository-type github --repo-url $gitrepo --branch master --git-token $token

# Copy the result of the following command into a browser to see the web app.
echo http://$webappname.azurewebsites.net
