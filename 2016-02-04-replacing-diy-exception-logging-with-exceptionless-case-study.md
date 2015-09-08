---
id: 14069
postTitle: 'Replacing DIY Exception Logging with Exceptionless &#8211; Case Study'
date: 2016-02-04T15:09:30-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts"]
---
<a href="https://referralrock.com" rel="attachment wp-att-14073" target="_blank"><img loading="lazy" class="alignright size-full wp-image-14073" style="margin-left: 20px;" src="http://exceptionless.com/assets/referral-rock-logo.png" alt="referral-rock-logo" width="222" height="108" data-id="14073" /></a>Today we bring you a case study from the founder of <a href="https://referralrock.com" target="_blank">Referral Rock</a> and serial entrepreneur, **Joshua Ho**.

Referral Rock is a referral platform for small businesses that Josh created after he &#8220;&#8230; **realized small businesses lacked the tools to <a href="https://referralrock.com/blog/referral-programs-101-everything-you-need-to-build-a-referral-marketing-program/" target="_blank">make a customer referral program work</a>.**&#8221; The app allows businesses to easily and effectively create, implement, and administer a rock-solid referral program to help grow their business.

Exceptionless recently became a part of Referral Rock&#8217;s exception reporting and logging toolkit, replacing Joshua&#8217;s home-grown exception logging solutions, and here are his thoughts!

<!--more-->

<p style="text-align: center;margin-top: 45px;margin-bottom: -40px;">
  <span style="font-size:100px">&#8220;</span>
</p>

<hr style="margin: 10px 0;" />
I&#8217;ve always done my own exception logging. Very basic stuff, where I would just log exceptions to my local drive. This gave me a nice place to just look at errors in my ASP.NET code. As with most code, it ended up in production deployments. At one point, I even built some web pages to view the logs remotely. Those little exception logging code snippets also made it into about 3-5 other projects as the years went by. I knew there was software out there that could do this, but I more or less had it solved for myself. 
**But that changed recently.**</p> 

<blockquote style="margin-top:20px;">
  <p>
    &#8220;One <strong>huge benefit</strong> Exceptionless adds to my business is giving me the ability to provide better customer support.&#8221;
  </p>
</blockquote>

## Enter Exceptionless

As I&#8217;ve been growing my own SaaS business for referral software, called <a href="https://referralrock.com/" target="_blank">Referral Rock</a>, I realized there were times my old solution wasn&#8217;t effectively capturing all the exceptions and I would have to venture into the Event Log to find out what happened. Also, I liked being able to view the production server remotely, but my little web pages got lost somewhere and I wasn&#8217;t excited about coding them again. Who likes to code the same thing more than once? Not I.

<blockquote style="margin-top:20px;">
  <p>
    &#8220;I could see details on the requests, browser cookies, user identity&#8230; all much more than I could see using my old solution.&#8221;
  </p>
</blockquote>

So that led me to look for other solutions to view my exceptions remotely, which is when I found Exceptionless. With the help of support, I got it up and running fairly quickly. The guys at Exceptionless were very responsive and helpful in getting me setup.

### Usage & Evaluation

Being a startup, I was initially using the free version for about 2 weeks and was **blown away**. The UI was great and I love the AngularJS based responsiveness. Soon I had a great pulse on my production server. I could see details on the requests, browser cookies, user identity&#8230; all much more than I could see using my old solution. Once I had it set up, I started to see the benefits using other types of events in Exceptionless, such as logging. I started adding some logs when I was debugging an issue with a customer, and it worked great.

<blockquote style="margin-top:20px;">
  <p>
    &#8220;With the help of support, I got it up and running fairly quickly. The guys at Exceptionless were very responsive and helpful in getting me setup.&#8221;
  </p>
</blockquote>

One **huge benefit** Exceptionless adds to my business is giving me the ability to provide better customer support. Not only do I know when errors are happening, but also who is seeing them. This allows me to have an opportunity to reach out to that specific customer, once the issue is fixed, and say something like &#8220;I saw you had and error when you did XYZ, I wanted to let you know it is fixed now so you can try it again&#8221;. Taking opportunities to provide that level of service has helped my business.

We are now running a paid version of Exceptionless with multiple projects and I look forward to adding more logs and playing with other features to give me even greater visibility into my web app. Thanks guys!

<span style="font-size:20px;"><i>&#8211; Joshua Ho // Founder, <a href="https://referralrock.com" target="_blank">Referral Rock</a></i></span>

<hr style="margin: 10px 0;" />

<p style="text-align: center;margin-top: 45px;margin-bottom: -50px;">
  <span style="font-size:100px">&rdquo;</span>
</p>

## No &#8211; Thank You, Josh!

We love to see people enjoying Exceptionless &#8211; it&#8217;s our baby, and we&#8217;ve put a lot of blood, sweat, and tears (I blame Blake) into it. Keep rocking it with Referral Rock!
