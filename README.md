[![Latest Stable Version](https://poser.pugx.org/nickdekruijk/forge-redirect/v/stable)](https://packagist.org/packages/nickdekruijk/forge-redirect)
[![Latest Unstable Version](https://poser.pugx.org/nickdekruijk/forge-redirect/v/unstable)](https://packagist.org/packages/nickdekruijk/forge-redirect)
[![Monthly Downloads](https://poser.pugx.org/nickdekruijk/forge-redirect/d/monthly)](https://packagist.org/packages/nickdekruijk/forge-redirect)
[![Total Downloads](https://poser.pugx.org/nickdekruijk/forge-redirect/downloads)](https://packagist.org/packages/nickdekruijk/forge-redirect)
[![License](https://poser.pugx.org/nickdekruijk/forge-redirect/license)](https://packagist.org/packages/nickdekruijk/forge-redirect)

# Redirect all traffic with Laravel Forge
I often need a way do redirect all traffic from site domain.eu to domain.com. But I want aaa.com to work with a LetsEncrypt SSL certificate too so that site must be hosted somewhere. Since I use forge to host many sites it made sense to me to also create a site for domain.eu and redirect everything to the .com variant. So I created this very small PHP script and have it on github so I can easily deploy this every time I create a new site on forge just for redirecting purposes.
After installing all I need to do is to add the right domainname to the .env file which is easy to edit within Laravel Forge.

# Frequently Asked Questions

## Why not use the build in redirect functions then?
The way Forge handles their redirects breaks the LetsEncrypt ACME validation since that validation URL is being redirected too.

## Why not add old domain an alias in the new site?
Then I would need to include all the domains that need to be redirected in the same SSL certificate and then everybody can see all the redirect domain names inside that certificate which might be bad for many reasons.
And because I don't want duplicate content on all the domains I need to manually redirect all domains to the main one from within the application too.
