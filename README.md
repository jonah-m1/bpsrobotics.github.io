# bpsrobotics.github.io
Homepage for BPSRobotics and Teams 1510 and 2898

Webmaster:				[@philiparola](https://github.com/philiparola)  
Frontpage maintainer:	[@philiparola](https://github.com/philiparola)  
Team 1510 maintainer:	[@jonah-m1](https://github.com/jonah-m1)  
Team 2898 maintainer:	[@jonah-m1](https://github.com/jonah-m1)  
### GitHub Pages Note
While we use GitHub Pages just because we can, some advanced website features will not work, such as our PHP apps (ie: safety tests).  As such, we do not recommend you use the GitHub pages site as a link to give out to prospective students, mentors, or parents.  It's just a convenience for us developers.
## Site Layout
The site is divided into four major sections, the homepage for BPSRobotics, an apps section, and a section for each team (FRC 1510, The Wildcats; FRC 2898, The Flying Hedgehogs).  This may be expanded in the future, depending on how involved we get with other teams in Beaverton.


For those who just want a pretty picture:
```
bpsrobotics.github.io
+---1510
|	\---...
+---2898
|	\---...
+---apps
|	+---phpapps -> git://github.com/bpsrobotics/bpsrobotics.github.io.git
|	|	\---safety
|	\---
\---...
```
This tree has been pruned for simplicity.  You get the idea.

## Contribution Guide
We prefer code to come from team members.  You can still try to contribute if you want, but there's no guarantee that your code will be accepted.
### Coding style
Still under negotiation.
### DeployHQ
We utilize [deployhq.com](https://deployhq.com) to deliver builds to our production server hosted by [GoDaddy](https://godaddy.com).  This means that whenever the master branch is pushed to, the actual production website is updated.  Therefore, the master branch is only updated via pull request or directly (only in emergencies) by the webmaster ([me](https://github.com/philiparola)).
### PHP Applications
The PHP apps are stored in a seperate repo called [webapps](https://github.com/bpsrobotics/webapps).  It consists solely of the safety test right now.  
Config files will be stored in a repo called [serverconfigs](https://github.com/bpsrobotics/serverconfigs), but we don't have any yet.
#### PHP Environment
In the event you are a masochist (PHP developer) and you want to contribute to our PHP apps, you will need to know our configuration.
##### The short answer
We use the GoDaddy defaults, which means cPanel, Apache Web Server w/PHP 5.4, and mySQL (with phpMyadmin).
##### The long answer
We use the GoDaddy defaults, and because GoDaddy is GoDaddy, that means there is a lot of weird crap that goes on behind the scenes.  For example, we've had strange happenings/differences with the safety test before.  It's a crapshoot, so ALWAYS write portable code.
