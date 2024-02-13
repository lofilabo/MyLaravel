SEE ALSO:
./Tinker--ways-to-enter-users.txt


sudo apt-get install sqlitebrowser
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^software for DB Browser.


all of these files are stored in a universally-active are

i.e.     /home/richard  <<--- one that starts with a "/"

so that it can be read from anywhere. ( NOT "../../etc")

Note that this arrangement is very necessary to allow the 
use of 

php artisan tinker

and then:

$user = \App\Models\User::factory()->create(['name' => 'Richard A','email' =>'test1@test1.com', 'password' => Hash::make('test1')  ]);
and
$user = \App\Models\User::factory()->create(['name' => 'Richard B','email' =>'test2@test2.com', 'password' => Hash::make('test2')  ]);
and
$user = \App\Models\User::factory()->create(['name' => 'Richard C','email' =>'test3@test3.com', 'password' => Hash::make('test3')  ]);

to invoke a new member.

TO REPEAT:

Make sure that mydb02_expt.db etc have a LOCATION which is IDENTIFIED
by a reference to "/" and NOT "../" 


This document is supposed to be read alongside .env
which should be in the root of the application.


0. BACKUP.env

	A backup of ../.env
	For reference and storage.

	RENAME as .env

1. mydb01.db

	The first file which worked!!

2. mydb02_expt.db

	The first one with 'correct' type of id
	So that new data can be squirted into it.


