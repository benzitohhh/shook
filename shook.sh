# For local, assumed that http://localhost/shook/wordpress points to the wordpress directory

# Convert prod sql to localhost
# sed "s/http:\/\/www.shook.fm\/content/http:\/\/localhost\/shook\/wordpress/g" prod.sql > temp.sql

# load sql
# mysql --max_allowed_packet=512M -uroot -proot shookfm_wp01 < temp.sql;

# If problem, run this from the mysql commandline:
set global net_buffer_length=1000000; 
set global max_allowed_packet=1000000000;

# Now, you should be able to access at: http://localhost/shook/wordpress

# Admin is at http://localhost/shook/wordpress/wp-admin
# user=admin, pass=jezmon22 

# To dump local
# mysqldump -uroot -proot shookfm_wp01 > dump-local-20140311.sql

# To convert localdump to a prod
# sed "s/http:\/\/localhost\/shook\/wordpress/http:\/\/www.shook.fm/g" dump-local-ben-20140311.sql > temp.sql

# To convert localdump to a bluehost temp dump
# sed "s/http:\/\/localhost\/shook\/wordpress/http:\/\/box367.bluehost.com\/\\~shookf1/g" dump-local-ben-20140311.sql > temp.sql






TODO:

move all passwords somewhere safe!


PROD

MYSQL
dbname = shookf1_shookfm_wp01
user = shookf1_db
pass = _uU04gwgcsGK





mysql -ushookf1_db -p_uU04gwgcsGK shookf1_shookfm_wp01 < temp.sql

unalias cp   # to disable overwrite checks

