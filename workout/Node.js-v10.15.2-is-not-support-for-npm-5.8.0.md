# Node.js v10.15.2 is not support for npm 5.8.0

When I want to install last npm in the terminal, and then it rises the warn.
'npm does not support Node.js v10.15' 

```
# check node.js version
node -v
v10.15.2

# check npm version
npm -v
5.8.0

# Install last version
npm install npm@latest -g
```

First step what I will do it, I must be update my Node.js version

## Installation instructions
### Node.js v13.x

```
# Using Ubuntu
curl -sL https://deb.nodesource.com/setup_13.x | sudo -E bash -
sudo apt-get install -y nodejs
```

Next step, I have tried without sudo, it rises error.
```
sudo npm install npm@latest -g

```
## References
```
# See more about NPM
https://www.npmjs.com/get-npm

# See more about installaion instructions for other system
https://github.com/nodesource/distributions/blob/master/README.md
```
