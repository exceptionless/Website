---
title: Self Hosting
tags: docs
anchor: self-hosting
---

# Self Hosting Exceptionless

# Docker
If you would like to test Exceptionless locally, please follow this section.
 
### Requirements
* [Docker](https://www.docker.com)
 
### Testing Setup

Runs Exceptionless without persisting data between runs. Good for checking out Exceptionless for the first time and testing.

```
docker run --rm -it -p 5000:80 exceptionless/exceptionless:latest
```

### Simple Setup

Runs a very simple non-production setup for Exceptionless with data persisted between runs in a sub-directory of the current directory called `esdata`. It uses an embedded single node Elasticsearch cluster and does not have backups. It is recommended that you create your own Elasticsearch cluster for production deployments of Exceptionless.

On Linux:
```
docker run --rm -it -p 5000:80 \
    -v $(pwd)/esdata:/usr/share/elasticsearch/data \
    exceptionless/exceptionless:latest
```
On PowerShell:
```
docker run --rm -it -p 5000:80 `
    -v ${PWD}/esdata:/usr/share/elasticsearch/data `
    exceptionless/exceptionless:latest
```

#### Simple Setup w/SSL Support and SMTP

Runs a very simple non-production setup for Exceptionless with data persisted between runs in a sub-directory of the current directory called `esdata`. It uses an embedded single node Elasticsearch cluster and does not have backups. It is recommended that you create your own Elasticsearch cluster for production deployments of Exceptionless.

On Linux:
```
docker run --rm -it -p 5000:80 -p 5001:443 \
    -e EX_ConnectionStrings__Email=smtps://user:password@smtp.host.com:587 \
    -e ASPNETCORE_URLS="https://+;http://+" \
    -e ASPNETCORE_HTTPS_PORT=5001 \
    -e ASPNETCORE_Kestrel__Certificates__Default__Password="password" \
    -e ASPNETCORE_Kestrel__Certificates__Default__Path=/https/aspnetapp.pfx \
    -v ~/.aspnet/https:/https/ \
    -v $(PWD)/esdata:/usr/share/elasticsearch/data \
    exceptionless/exceptionless:latest
```

On PowerShell:
```
docker run --rm -it -p 5000:80 -p 5001:443 `
    -e EX_ConnectionStrings__Email=smtps://user:password@smtp.host.com:587 `
    -e ASPNETCORE_URLS="https://+;http://+" `
    -e ASPNETCORE_HTTPS_PORT=5001 `
    -e ASPNETCORE_Kestrel__Certificates__Default__Password="password" `
    -e ASPNETCORE_Kestrel__Certificates__Default__Path=/https/aspnetapp.pfx `
    -v ~/.aspnet/https:/https/ `
    -v ${PWD}/esdata:/usr/share/elasticsearch/data `
    exceptionless/exceptionless:latest
```

# Kubernetes 
Please follow this section to set up Exceptionless in a Kubernetes environment. Please note this section is a work in progress, any contributions is greatly appreciated.

### Requirements
* <a href="https://kubernetes.io" target="_blank">Kubernetes</a>
* <a href="https://helm.sh" target="_blank">Helm</a>

### Instructions
Please note that we recommend you use Kubernetes for running in production.

1. Follow the steps [here](https://github.com/exceptionless/Exceptionless/blob/master/k8s/ex-setup.ps1) for how to create it in AKS
2. View the configuration settings below for more information on configuring Exceptionless.
3. [Configure your clients](https://github.com/exceptionless/Exceptionless.Net/wiki/Configuration#self-hosted-options) to send errors to your website.

Now, you can create a local account, organization, and project and send events to it.

# Configuration
The following section will cover how to configure exceptionless inside of a Kubernetes instance using the `exceptionless-config` config map. All exceptionless configuration keys are prefixed with `EX_`. Please note that these instructions also apply to docker using environment variables.

All configuration options and settings can be found in the various option classes located [here](https://github.com/exceptionless/Exceptionless/tree/master/src/Exceptionless.Core/Configuration).

_Please note that if you are specifying configuration via `docker-compose`, then you will need to drop the `EX_` and `EX_ConnectionStrings__` prefixes._

### ConnectionStrings
```yaml
# connection string used for any provider specifying Redis. 
EX_ConnectionStrings__Redis: server=localhost:6379,abortConnect=false

EX_ConnectionStrings__Cache: provider=redis;
EX_ConnectionStrings__Elasticsearch: server=http://10.0.0.4:9200;
EX_ConnectionStrings__Email: smtps://user%40domain.com:password@smtp.domain.com:465
EX_ConnectionStrings__MessageBus: provider=redis;
EX_ConnectionStrings__Metrics: provider=statsd;server=localhost
EX_ConnectionStrings__Queue: provider=redis;
EX_ConnectionStrings__Storage: provider=azurestorage;
```

You can append values to any connection string using a `;`. For example, you can control many shards and replicas each Elasticsearch index should be created with by appending to the `EX_ConnectionStrings__Elasticsearch` connection string. For a Elasticsearch cluster (3 nodes, two masters), you would append `shards=3;replicas=1`. 

The `provider` value determines what implementations to use for the various abstractions. We've made it easier to reuse a single connection string by automatically looking up a connection string by the provider name and adding any key value pairs to the current connection string (as shown above with redis).

### General Configuration
1. You'll want to set the `EX_ApiUrl` key to your external url of the api.
2. You'll want to set the `EX_BaseUrl` key to your external url of the website. If you are not following the clean urls optional section below, please make sure you also add the hashbang (`/#!`) to the base url.
3. `EX_AppMode` should be set to `Production` if you want to send unrestricted emails.
4. Please take a quick look at all the configuration options and settings that can be found in the various option classes located [here](https://github.com/exceptionless/Exceptionless/tree/master/src/Exceptionless.Core/Configuration).

#### Active Directory Authentication
To enable Active Directory authentication, update the Update the `exceptionless-config` config map to include the `EX_ConnectionStrings__LDAP` connection string. The value should be your domain's LDAP URI (e.g. `LDAP://ad.domain.com/` or `LDAP://ad.domain.com/DC=domain,DC=com`).

Please note the following:

1. Users must still go through the registration process using their AD credentials. This allows account setup to proceed as normal. AD credentials are **not** stored.
2. Exceptionless relies on the following properties being available in AD:
    * `mail`: user's email address
    * `givenName`: user's first name
    * `sn`: user's last name
    * `sAMAccountName`: user's username
3. To ensure the correct account information is retrieved for a user, consider using a more specific connection string to narrow down the LDAP account type. For example: `LDAP://ad.domain.com/OU=Standard Users,OU=User Accounts,DC=domain,DC=com`

#### Enabling Slack Integrations
1. Create a Slack app for your workspace
    * __Please do not distribute your app outside of your organization.__
2. Go to the `OAuth & Permissions` feature. Add a new redirect URL. The redirect URL should be your Exceptionless base URL.
3. On the *basic info* page of your Slack App, you will need to find the Client ID and Client Secret
4. Update the `exceptionless-config` config map `ConnectionStrings__OAuth` value to include `SlackId=YOUR_ID;SlackSecret=YOUR_SECRET;` and restart the associated pods.
5. If you've already loaded a page in Exceptionless, you will need to do a hard refresh for the config changes to apply.

# Upgrading
Please see the [Upgrading](Upgrading) for details on how to upgrade to the current version.

# Troubleshooting
If you are having issues please try the following to resolve the issues. If this doesn't work please open an issue or contact us on [slack](https://slack.exceptionless.com).
* Make sure you are running the latest release by visiting our [releases page](https://github.com/exceptionless/Exceptionless/releases). You can verify the version you are currently running by accessing the status page [`http://localhost/api/v2/about`](http://localhost/api/v2/about).
* You can also enable detailed logging by updating the `Serilog__MinimumLevel__Default` config map value to `Debug`.

#### Click [here](https://github.com/exceptionless/Exceptionless/wiki/Self-Hosting-Previous-Versions) if you are looking for documentation on self hosting older versions of Exceptionless.