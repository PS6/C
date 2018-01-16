#!/bin/bash
#
# use with azure-cli
#

gitrepo=https://github.com/PS6/C.git
token=<generate in github, settings, developer settings, personal access token with hooks allowed>
rgname=ps6c_RG
webappname=ps6c
# FQDN requires SKU >= SHARED and cname in domain
fqdn=p.s6.com
# run az webapp list-runtimes to get a list of available runtimes
runtimestr="php|7.1"

# Create a resource group.
az group create --location westeurope --name $rgname
# Create an App Service plan in `FREE` tier.
az appservice plan create --name $webappname --resource-group $rgname --sku FREE

# Create a web app.
az webapp create --name $webappname --resource-group $rgname --plan $webappname \
--runtime $runtimestr

# Configure continuous deployment from GitHub.
# --git-token parameter is required only once per Azure account (Azure remembers token).
az webapp deployment source config --debug --name $webappname --resource-group $rgname \
--repository-type github --repo-url $gitrepo --branch master --git-token $token

# Map your prepared custom domain name to the web app.
az webapp config hostname add --webapp-name $webappname --resource-group $rgname \
--hostname $fqdn

# Copy the result of the following command into a browser to see the web app.
echo http://$webappname.azurewebsites.net
# IF FQDN
echo http://$fqdn (which is CNAME to url above)
