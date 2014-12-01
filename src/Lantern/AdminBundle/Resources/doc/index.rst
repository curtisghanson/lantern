Admin Menu Structure

* Dashboard
* Security
    * Users
        - profile
        - security
        - preferences
    * Groups
    * Roles
    * Permissions
        - upload, edit media, delete media, etc
* Server
    - server name
    - send anonymous stats
    - auto check updates
    - enable debugging
    - port
    - url base
    - ipv6 support
    - ssl cert
    - ssl key
    - folder chmod
    - file chmod
    * Database
* Content
    * Types
        - movie, tv, shorts, vodcast, video clip
        - music, classical, video game, podcast, audiobook, audio clip
        - ebook, ezine, ecomic, ejournal, photo, image
        - game, app, file
    * Directories
        - location where files stored
    * Libraries
        - made of one or more directories
        - auto update
    * Categories/Tags
    * Playlists
    * Parental Controls
* Services
    * Google Drive, Dropbox
    * Yahoo Weather, Wunderground
    * Picasa, Flickr
    * Youtube, Vimeo
    * Pandora, Spotify, Shoutcast
    * Podcast Addict
    * Usenet, Torrents
    * SABNZBd, Transmission
* Transcoding
    * FFMpeg, AVConv
    * HLS
* Metadata Providers
    * Lantern Media Group, set type
    * TVDB
    * The Movie Database
    * Musicbrainz
    * Movie Posters
    * OpenSubtitles
    * LastFM
    * Wikipedia
* Plugins
* Scheduling
    - cron > job
    - jobs: search for media, clean dirs, etc.
* Themes
    - Admin
    - TV
    - Desktop
    - Reader
    * Menus
* Sharing
    - DLNA
    - AirPlay, iTunes
    - UPnP
    - DAAP
* Party
    - start a party
* Social
    - LastFM
    - Twitter
* Downloaders
    * Content Providers
        - search content type with service provider
    * Content Filters
        - filter searches by keywords
            - preferred words
            - required words
            - ignored words
            - filter groups
    * Quality Profiles
        - download by quality profile
    * Downloaders > sabnzbd, transmission, etc.
        - host
        - port
        - url base
        - ssl
        - api key
        - username
        - password
        - opts: category, priority, directory, cleanup, onerror, onsuccess
* Renamer
    * By Content Type
        - folder naming
        - file naming
        - unzipping
* Metadata
    - add nfo
    - add subtitle
    - add cover, artwork
    - add trailers
    - add theme music
    - add lyrics
    - add xbmc/media browser, sony, windows media files
    - add lantern.xml
* Notifications
    - social
    - services
    - users
    - email
* Automation
    - by content type
        - use services to determine what to download
* Dynamic Content
    - recommend based on holidays
    - recommend based on current events
    - recommend based on most watched, etc
    - curated playlists
* User
    * Profile
    * Settings
        - locale
        - theme music
    * Preferences
        - suggested content
    * Menus
    * History
    * Playlists, Bookmarks, Custom Queries
    * Devices
* API
* NodeJS, Websockets, AJAX Polling


Mounts

+ Create New Mount

Mount Name        ____________________
Mount Description ____________________
                  ____________________
Mount Path        ____________________

Libraries

+ Create New Library

Library Name        ____________________
Library Description ____________________
                    ____________________
Media Type          [movie, classical, ebook, ...]
Mounts
    Mount Name
    Folder:      [artist]/[album]
    Roles:
    Media Rules: %quality|vals(['HD'])%, [etc]
    Is Default: if no criteria matched, default here anyway


Storage/Renamer Builder
-----------------------
%resolution-width (width of video, 1280)
%audience (rating, MPAA-PG-13, TV-Y7, ESRB-10+)
%thename (The Notebook)
%cd (CD#)
%video-codec (x264)
%year (2005)
%quality (720p)
%quality_type (HD or SD)
%group (release group, Yify)
%cd_nr (1 or 2, no CD)
%source (BluRay)
%3d (if 3d, 3D)
%audio_channels (stereo, 5.1)
%id-imdb (id: source)
%3d-type (Full SBS)
%namethe (Notebook, The)
%resolution-height (height of video, 720)
%ext (file extension)
%audio-codec (DTS or AAC)
%first-letter (A ... Z)
%studio
%artist
%date|format('y-m-d')%
$if2(%albumartist%,%artist%)/%album%/$if($gt(%totaldiscs%,1),%discnumber%-,)$num(%tracknumber%,2) %title%

Library > Mounts > FolderScripting > FileScripting

How to Organize a Library

Choose a library type

Before creating a library, you must create a mount. A mount is simply a directory
that will follow some organizational rules for storing media objects.

After selecting a mount or mounts, rules are put in place for organizing media.
For each library type, some default rules are put in place, but can be modified
as needed. If multiple mounts are selected, custom rules MUST be made before
comfirming your setup.

Examples for the default for each library type are shown below:

movie    /%thename% (%year%)/
episode  /%thecollectionname%/Season %number|format(2)%/
short    /%thename%/
vodcast  /%thecollectionname%/Season %number|format(2)%/
musicvideo /$if2(%albumartist%, %artist%)$/
videoclip
track
podcast
composition
videogamesong
audiobookclip
specialtrack
audioclip
ebook
ezine
ejournal
ecomic
document
photo
image
videogame
application
file

Recipes for movies

Let's say you have a unique setup where you have a Movie library and a CAM Movie
Library. The movie library contains two mount points: an SD mount and an HD mount.
Clients within your home network have access to the HD section while clients
outside your home network only have access to the SD contents. However, when a
movie is released in Usenet or Torrent that is a CAM, you want it immediately
available to watch in the CAM library. But as soon as the movie is released in
at least SD or HD quality, you want it removed from the CAM library and added
to the SD and/or HD mounts in the Movie library. Lantern provides a very simple
interface for performing such a complicated task. Follow below:

Three Mount Solution
--------------------

Create three mounts:

Mount 1
Name: movie_hd
Description: The HD movie directory
Path: /path/to/hd/directory

Mount 2
Name: movie_sd
Description: The SD movie directory
Path: /path/to/sd/directory

Mount 3
Name: movie_cam
Description: The CAM movie directory
Path: /path/to/cam/directory

Create two libraries

Library 1
Name: movies
Description: The movies library
Mounts:
    Mount: movie_hd
    Folder: /%thetitle% (%year%)
    Rules:  %quality-type|vals(['HD'])%
    Access:
        ByIp: 255.255.255.0

    Mount: movie_sd
    Folder: /%thetitle% (%year%)
    Rules:  %quality-type|vals(['SD'])%
    Default: true

Library 2
Name: cams
Description: The cam movies library
Mounts:
    Mount: movie_cam
    Folder: /%thetitle% (%year%)
    Rules:  %quality|vals(['CAM'])%

Create a job

Job 1
Name: remove_cam_when_better_found
Description: Remove cam movie when a higher quality is added
Workflows:
    Name: workflow_1
    Trigger: 
    Rule-1: $ifin(%media-id%, %mount|vals['movie_hd', 'movie_sd']%)$
    Rule-2: $and($ifin(%media-id%, %mount|vals['movie_cam']%)$)$
    Action: $removeallfrom(%media-id%, %mount|vals['movie_cam']%)$

There it is. You now have lantern managing your CAMS and better qualities. One
last thing to note. You noticed we selected `Default: true` on our movie_sd mount.
This is our "just-in-case" setting. If we grabbed a movie and are unable to
determine its quality, we put it here.

Two Mount Solution
------------------

Create two mounts

Mount 1
Name: movie
Description: The movie directory
Path: /path/to/sd/directory

Mount 2
Name: movie_cam
Description: The CAM movie directory
Path: /path/to/cam/directory

Create two libraries

Library 1
Name: movies
Description: The movies library
Mounts:
    Mount: movie
    Folder: /%quality-type%/%thetitle% (%year%)
    Access:
        ByRule: $if(%folder% == %quality-type|vals(['HD'])%)$$then($byip('255.255.255.0')$)$
    Default: true

Library 2
Name: cams
Description: The cam movies library
Mounts:
    Mount: movie_cam
    Folder: /%thetitle% (%year%)
    Rules:  %quality|vals(['CAM'])%

Create a job

Job 1
Name: remove_cam_when_better_found
Description: Remove cam movie when a higher quality is added
Workflows:
    Name: workflow_1
    Trigger: 
    Rule-1: $ifin(%media-id%, %mount|vals['movie']%)$
    Rule-2: $and($ifin(%media-id%, %mount|vals['movie_cam']%)$)$
    Action: $removeallfrom(%media-id%, %mount|vals['movie_cam']%)$

Global rules can be created and referenced by alias instead of adding individual
scripts to each directory's access rules. In fact, it's recommended to create
global rules for ease of use and extensibility.

Recipes for classical music

Unlike popular music, classical music wasn't packaged like albums. Even though
we purchase albums containing classical music, we often get a collection of works
from a couple composers or even just a popular movement. To make our music storage
universal, we may still want to store our classical music in albums but use a
proper interface for listing and playing our tracks. Lets use JS Bach as our
example artist. We want to navigate our classical library with the following
tree method:

    1. Era (ie classical, baroque, medieval)
        2. Composer (ie JS Back, Vivaldi, Schummann)
            3. Composition
            or
            3. Catalogue
                4. Composition
            or
            3. Symphony
                4. Movement

Luckily for us, lantern already has the display formats built-in. In addition,
since a composer might have more than one catalogue, we have options to choose
which to use.

To build our custom display, lets first create the classical mount and library

Create a mount

Mount 1
Name: classical_music
Description: The classical music directory
Path: /path/to/classical/music/directory

Create a library

Library 1
Name: classical_music
Description: The classical music library
Mounts:
    Mount: class_music
    Folder: /%artist%/%album%
    Default: true
    Browse:
        1. %era% > %composer% or %composer%
        2. %composition% or %catalogue% > %composition% or %symphony% > %movement%

We've created a tree structure and custom browsing for our folders. Now, let's say
we want our JS Bach composer's works to be displayed using the BWV catalogue.

In our library view for classical, you will notice there is a checkbox:

    ___ Use Composer Catalogues When Avaialable

Check it and press save.

You will notice a new menu item `Catalogues`

In catalogues, for each of the classical artists in your library, available
catalogues should be displayed. Check the catalogues you want for each composer.
If you would like a catalogue stored in the system for an artist you do not yet
have uploaded, click `Add Catalogue for Composer Not Yet Indexed`

At the bottom of the page, you have the option to display the catalogues of all
artists (including those of which you do not yet own) and the option to display
the catalogue item of a composition (including those of which you do not yet own).

Note: creating these indexes take a little time. You may see a message stating
that the indexing has not yet completed. Be patient, it will be ready momentarily.
If you are not patient, like all other jobs in the system, you can go to the jobs
view to see the process' progress (tongue-twister).