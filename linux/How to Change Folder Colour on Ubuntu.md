# How to Change Folder Colour on Ubuntu

**Learn how to change folder colour on Ubuntu in this simple guide, which covers both Ubuntu 18.04 and Ubuntu 20.04 LTS.**

> You might be asking why you would want to change the folder colors on Ubuntu? Well…

You don’t need to download a new icon pack or switch to a different icon theme in order to change the colour of a folder.

All you need is a free, open source tool called *Folder Color* (sic). It’s even available straight from the Ubuntu repos.

Using *Folder Color* you can instantly **change the colour of individual folders** or **change the colour of several folders** at once — and you can do this as many times as you want!

Helpfully, the tool also makes it easy to undo and reset a folder to  its original colour. So if you don’t like a change you make it’s simple  to revert.

But why might you want to change folder colour on Ubuntu in the first place? 

Personally, I find it harder to visually “locate” a specific folder  if they’re all the same color. The added glyphs shown on the default  folders in *Home* help, but they aren’t available elsewhere. 

Using different coloured folders for different types of content or tasks is a simple way to overcome this dilemma.

For example, I save all of the screenshots I take for use in blog  posts (such as this one) in to a de dictated folder — a folder that I  made blue:

![different colour folders](https://149366088.v2.pressablecdn.com/wp-content/uploads/2020/04/add-folder-emblem--750x260.jpg)Folder colurs can make directories easier to find

Using a separate folder means my screenshots don’t get mixed up  amongst my other images and folders. But changing the colour of the  folder icon also makes it easier to “spot” every time I open the *Pictures* folder (as my eyes register the folder colour before they register the label beneath it).

The *Folder Color* tool offers more than a short, sharp shot  of colour too. You can use to add  emblems to folders (e.g.,  “important”, “finished”, “in progress”, etc) for additional visual  prominence, just like in the screenshot above.

## Install Folder Color on Ubuntu

As mentioned, *Folder Color* is free, open-source software. It works with Ubuntu’s *Nautilus* file manager, as well as with the *Caja* (Ubuntu MATE) and *Nemo* (Linux Mint) file managers.

Click the button below to install Folder Color on Ubuntu 18.04 LTS or above:

​          [                                                                              Install Folder Color from Ubuntu Software       ](apt://folder-color)    

Once the utility is installed you  need to restart Nautilus before the color choices menu shows up. To do this press `Alt + F2`, type ‘`nautilus -q`‘, and hit the return/enter key.

If you’re using *Caja* or *Nemo* be aware that you MUST also install the `folder-color-caja` or `folder-color-nemo` package.

### Extra step for Yaru Icon Theme

Using Ubuntu 20.04 with the default Yaru icon pack? You will need to  install an additional tool, which is freely available from the Folder  Color maintainers’ PPA.

Open a terminal window and run:

```
sudo add-apt-repository ppa:costales/yaru-colors-folder-color
```

Followed by 

```
sudo apt install yaru-colors-folder-color
```

Once everything gets installed **restart your file manager.** You can do this by logging out and back in or, if you’re using Nautilus, by pressing `Alt` + `F2` and running `nautilus -q` command (though don’t do this if there are active file transfers taking place).

### Using Folder Colour

[![img](https://149366088.v2.pressablecdn.com/wp-content/uploads/2020/04/change-folder-icon-colour-750x499.jpg)](https://149366088.v2.pressablecdn.com/wp-content/uploads/2020/04/change-folder-icon-colour.jpg)

The beauty of this tool is that you use it right where you use  folders: in the file manager. There’s no separate pop up window or app  to worry about.

**Simple** right-click on any folder in the file manager to access a new “Folder’s Color” (sic) sub menu. Pick a hue from the  pre-populated list and the change is applied instantly.

You can **change the color of multiple folders at the same time** too. Just select more than one folder (use your mouse or `ctrl` + click on the directories you wish to include) then right-click on any of those selected > *Folder’s Color* > pick a colour.

Bam!

You can undo your changes at any time. Just follow the same steps as above but this time choose the ‘*Default*‘ option listed under the ‘*Restore*‘ heading the sub-menu.



#Ref

https://www.omgubuntu.co.uk/change-folder-color-ubuntu