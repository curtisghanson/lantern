File Manager Bundle

Tree

Mount

* purpose - declare a mount
* a mount is a directory that hosts files
* configurations
    * name
    * description
    * path
    * whitelistMimeTypes
    * blacklistMimeTypes
    * ignoredMimeTypes
    * blacklistFileSizes
    * mediaType
    * whitelistUsers
    * blacklistUsers
    * whitelistRoles

Adding Media

Media can be added in several manners:

* Added manually to your specified directory directly on the server,
* Added manually to a cloud storage provider configured in lantern,
* Downloaded using any of the built-in services (usenet, torrent), or
* Uploaded via the web interface.

While media can be explicitly loaded to a directory, lantern advises you to
upload ALL media to a configured point-of-origin directory (or directories)
for lantern to process further.

Configuring Your Point(s)-of-Origin

You have several options for creating point(s)-of-origin. We recommend setting
up a directory for each library, and depending on your external downloader
services, one for each of them.

Lets consider this example:

You have a movie library and music library. In addition, you have SABnzbd for
usenet files and Transmission for torrent files. You might have your libraries
configured as follows:

movie directory > /mnt/mount1/movies/
music directory > /mnt/mount2/music/

And to keep all your downloads and uploads organized, you might set your
points-of-origin as follows:

Library PoO Name | Type  | New Media Directory
-----------------+-------+-------------------------
TempMovies       | movie | /mnt/mount0/temp/movie
TempMusic        | music | /mnt/mount0/temp/music
TempTorrents     | guess | /mnt/mount0/temp/torrent

And lastly, you would configure SABnzbd's categories as follows:

Category > Directory
---------------------------------
movie    > /mnt/mount0/temp/movie
music    > /mnt/mount0/temp/music

In the above configurations, your movie and music upload directories,
respectively, will be processed appropriately (ie files in the movie directory
will be processed as movie files as music would for music). Notice, however,
that your torrent directory has no library association. Never fear, you can see
that we set our type to `guess`. Lantern will make an attempt at figuring out
where this file goes. If lantern is wrong, simply navigate to:

Admin > Downloads > Files

And select the job that processed and change it's type to revert the change. Be
aware, this file's history is only stored (by default) for one week. Meaning,
after one-week, this file cannot not be reverted and must be moved using the
Cross-Library Media Migration Tool, located:

Admin > Media > Edit (id) > Move to Another Library

Besides selecting `guess`, you may also choose `manual`. Any file inside a
directory with the type `manual` must have the type changed after it is
downloaded. Just like before, go to: Admin > Downloads > Files to set your type.

