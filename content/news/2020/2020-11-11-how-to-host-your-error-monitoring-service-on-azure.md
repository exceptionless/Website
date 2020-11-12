---
title: How To Host Your Error Monitoring Service on Azure
date: 2020-11-11
draft: true
---
    
We [previously wrote about](https://exceptionless.com/news/2020/2020-09-30-how-to-self-host-your-error-monitoring-service/) how to run a self-hosted instance of Exceptionless locally. Today, we are going to explore how to deploy a self-hosted instance to Azure. First, let's remind you what Exceptionless is and how it's different from other error monitoring services. 

## What is Exceptionless  

Exceptionless is a cloud-based error monitoring service that focuses on real-time data injestion and configuration. Exceptionless sets itself apart from the competition through its real-time pipeline and how it combines events to make them actionable through a process called stacking. 

Unlike most error monitoring services, Exceptionless is dedicated to the open-source community and the entire code base is available on Github to inspect, contribute to, or fork. And, of course, Exceptionless can be self-hosted. 

That last bit is what we'll be focusing on today. 

## Getting Started  

To start, you'll need to sign up for a Microsoft Azure account if you don't have one already. Head on over to [Azure's Cloud Computing site](https://azure.microsoft.com/en-us/) and sign up for a free account. You'll be asked to enter your card information, but you won't be charged unless you upgrade beyond their free plan. Once you've signed up, you'll be able to go to your portal and start a project.

![Azure Portal](quickstart.png) {.text-center}

Click on the "Deploy virtual machine" option. You'll then have the option to create a Linux virtual machine or a Window virtual machine. We're going to be using Linux for the sake of this tutorial, so go ahead and select that option. Now, we can configure our virtual machine (VM). 

![Configuration for VM](configuration.png) {.text-center} 

You can leave your Subscription option as the default selection. You will need to create a resource group. Click the "Create new" button beneath the resource group section. You'll need to give this group a name. We'll call it "Exceptionless". Next, we need to give our VM a name. You can name it whatever you'd like, but I'm going to keep it simple: `exceptionless-vm`.

Next, you can change your Region if you'd like. I'm going to leave it set to the default. I will also leave my Availability Options and Availability Zone as the default. Make sure the image you select is Ubuntu Server 18.04 LTS. The next part is important. It's likely that the recommended VM instance selection is way too expensive and will blow through your free plan on Azure. You may find that you need to bump things up in the future, but for now, it's ok to start with the *B1s*. This machine will give you: 

* 1GB RAM
* 4 GB Temp Storage 
* 1 CPU  

We're not doing heavy computations with our machine, so this should be fine. 

Now, you'll need to decide how you authenticate into your VM. I highly recommend SSH but you are welcome to use username and password. If you choose the SSH route, Azure can generate the keypair for you. The final step on this page is to select your allowed inbound ports. We will change this later. For now, we're going to allow SSH, HTTP, and HTTPS while we're getting set up. 

![Allowed Ports](ports.png) {.text-center} 

You can look through the other tabs in your configuration settings, but I'm going to leave everything as default. So, now we can click "Review and Create."

You'll be asked to confirm your settings. Once you do, if you chose to authenticate with an SSH key, you'll be prompted to download this keypair. Please do so and store it somewhere safe and somewhere you'll remember. Your VM should be creating now. In a few minutes, it will be accessible. 

## Accessing Your VM  

When you VM is done creating, you'll be able to click the Go To Resource button. Otherwise, when you log into your Azure account, it will be displayed as a Recent Resource: 

![Recent Resources on Azure](resources.png) {.text-center} 

Once you go to your VM resource, you'll see a Connect button at the top of the screen. Click that and you'll see instructions for connection. You'll follow the appropriate instructions for your chosen method of authentication. For me, I'll be following the SSH instructions and will document those here. 

Open the terminal client of your choice and enter the following: 

`chmod 400 PATH_TO_PEM_FILE` 

Now you can connect as a root user: 

`ssh -i <private key path> azureuser@PUBLIC_IP`

Your IP address will be listed on your Azure resource page. 

If all went well, you have now accessed your VM. However, we are accessing our machines as the root user. This isn't the best idea. So, we're going to create a new user and we will run all of our commands, installations, etc with this new user. 

`sudo adduser USERNAME`  

You'll be prompted to enter a password for this user and confirm that password. Go ahead and do that. When you're done, you'll be prompted to enter the user's information. You can just hit Enter to bypass selections here. 

Now, when you SSH into your VM, you can log in as the user you create like this: 

`sudo login`

Now, let's give our new user admin privledges. 

`sudo usermod -aG sudo USERNAME`

With all of this complete, we should be ready to install dependencies!

## Installing Dependencies  


