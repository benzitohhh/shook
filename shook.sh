#########################
# PRODUCTION DETAILS
########################

#temporary url:
http://box367.bluehost.com/~shookf1/

#full url:
http://www.shook.fm

#control panel:
bluehost.com
user = shook.fm
pass = Jezmon22!!!

#ftp:
host = box367.bluehost.com or shook.fm
user = shookf1
pass = Jezmon22!!!
port 21 (i.e. FTP, not SFTP)

#ssh:
host = box367.bluehost.com or shook.fm
user = shookf1
pass = Jezmon22!!!

#MySQL
dbname = shookf1_shookfm_wp01
user = shookf1_db
pass = _uU04gwgcsGK

# to disable overwrite checks
unalias cp   

# To dump prod db
mysqldump -ushookf1_db -p_uU04gwgcsGK shookf1_shookfm_wp01 > dump-prod-old-20140625.sql

# To convert dump to use new urls
sed "s/http:\/\/box367.bluehost.com\/\\~shookf1/http:\/\/www.shook.fm/g" dump-prod-old-20140625.sql > temp.sql

# To update db
mysql -ushookf1_db -p_uU04gwgcsGK shookf1_shookfm_wp01 < temp.sql



##################
# To set up on local...
##################

# For local, assumed that http://localhost/shook/wordpress points to the wordpress directory

# Convert prod sql to localhost
sed "s/http:\/\/www.shook.fm\/content/http:\/\/localhost\/shook\/wordpress/g" prod.sql > temp.sql

# load sql
mysql --max_allowed_packet=512M -uroot -proot shookfm_wp01 < temp.sql;

# If problem, run this from the mysql commandline:
set global net_buffer_length=1000000; 
set global max_allowed_packet=1000000000;

# Now, you should be able to access at: http://localhost/shook/wordpress

# Admin is at http://localhost/shook/wordpress/wp-admin
# user=admin, pass=jezmon22 

# To dump local db
mysqldump -uroot -proot shookfm_wp01 > dump-local-20140311.sql

# To convert localdump to prod
sed "s/http:\/\/localhost\/shook\/wordpress/http:\/\/www.shook.fm/g" dump-local-ben-20140311.sql > temp.sql

# To convert localdump to a bluehost temp dump
sed "s/http:\/\/localhost\/shook\/wordpress/http:\/\/box367.bluehost.com\/\\~shookf1/g" dump-local-ben-20140311.sql > temp.sql


