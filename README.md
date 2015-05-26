# LCMBrightcoveBundle
Bundle wrapper for the Brightcove API

##Installation

Required packages (because the brightcove api isn't appropriately maintained we need to require it manually to set the minimum-stability flags):
```json
// composer.json
"brightcove/mapi": "@dev",
"lcm/brightcove-bundle": "@dev"
```

Update the Kernel:
```php
//AppKernel.php

new LCM\BrightcoveBundle\LCMBrightcoveBundle(),
```

##Configuration

```yml
lcm_brightcove:
  token:
    read: # your read token
    write: # your write token
  
  # optional configuration
  cache:
    type: # file || memcache, Default file
    time: # Time to cache expires, default 600 sec
    location: # Must be specified if you configure cache
    extension: # default .c
    port: # default 11211
    
  timeout:
    attempts: # integer
    current: # integer
    delay: # integer
    retry: # boolean
  
  url:
    read: # string
    write: # string
    
  api_calls: # integer
  bit32: # boolean
  media_deliver: # integer
  secure: # boolean
  show_noties: # boolean
  valid_types: # integer
```
