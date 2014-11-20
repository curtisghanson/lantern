Lantern Auth Bundle
===================


Users
-----

@todo this section is not yet complete


Roles
-----

Roles are the underlying component to give users explicit functionality and
permissions within the lantern application. These may be as simple or complex
as you choose to make them.

Out of the box, you are given four roles to manage your users:

* `ROLE_USER`
* `ROLE_ADMIN`
* `ROLE_SUPER_ADMIN`
* `ROLE_ALLOWED_TO_SWITCH`

Note: To access the application, all users are required to have the ROLE_USER role.

In addition, roles may be heirarchical in nature. By granting a user a parent
role, an child roles are automatically assumed. For example:

  `ROLE_ADMIN` is parent to `ROLE_USER`. By assigning a user `ROLE_ADMIN`, the
  user is automatically granted `ROLE_USER`.

Out of the box role hierarchy is as follows:

* `ROLE_SUPER_ADMIN`
  * `ROLE_ALLOWED_TO_SWITCH`
  * `ROLE_ADMIN`
    * `ROLE_USER`

`ROLE_ALLOWED_TO_SWITCH` is a special role that allows an administrator the
ability to impersonate any user of the system. By default, this role is NOT
parent to any other role in the system. Under most circumstances, you should
never make it a parent role. This role can be assigned individually to users
whom you do not want to grant full `ROLE_SUPER_ADMIN` permissions. If your
roles are properly setup hierarchically, a user with this role assigned will
not be allowed to impersonate any user with roles beyond the capability of
the impersonator. For example:

  Assuming the above role hierarchy. You are the administrator and you wish
  to give user Bob the `ROLE_ALLOWED_TO_SWITCH` role. He currently only has
  `ROLE_USER` assigned. After assigned, Bob should only be allowed to
  impersonate other users who also only have `ROLE_USER` assigned.

Roles may be changed to fit your needs in the system. Lastly, it is important to
note that all roles are prefixed `ROLE_` and always contain only uppercase
letters, numbers, and underscores. This is mandatory and the system will
NOT allow you to create a role that is not properly prefixes. For more
information on roles, consult the role documentation.


Groups
------

Groups are a collection of roles and are not mandatory for use in the system.
Groups, like roles, are also hierarchical and must be prefixed `GROUP_` and
may only contain only uppercase letters, numbers, and underscores. Lastly,
groups must contain at least one role.

You may be asking yourself 'Why are there groups if roles can already be
parents and children of other roles?' Great question. The main concept here
is that creating a complex role hierarchy can become convoluted and
overwhelmingly difficult to maintain. If your roles are consuming other roles
so often, you should consider creating groups for two reasons:

1. semantics, and
2. simplicity

By leaving your role hierarchy simple (like leaving the defaults intact),
you can create a bunch of groups to manage roles. This way, you won't have to
worry about broken hierarchies or infinite role loops.

Note: lantern should be smart enough to prevent against cyclical role
assignments. If you manage to construct one, submit a ticket.

For more information, consult the groups documentation.
