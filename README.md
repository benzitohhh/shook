# Shook


## Installation on bluehost

1) ssh into bluehosts
```
ssh shookf1@shook.fm
```

2) Clone this repo into dir `public_html`
```
git clone git@github.com:benzitohhh/shook.git public_html
cd public_html
```

3) Install mysql database
```
mysql -ushookf1_db -p_uU04gwgcsGK shookf1_shookfm_wp01 < dump.sql
```

4) Config file
```
cp wp-config.prod.php wp-config.php
```

5) Htaccess
```
cp .htaccess.prod .htaccess
```

## To dump db
mysqldump -ushookf1_db -p_uU04gwgcsGK shookf1_shookfm_wp01 > dump.sql

## To dump code/uploads
tar -cvzf ~/shook-backup.tar.gz ~/public_html


## Installation on local

1) Clone this repo somewhere

2) Add Apache symlink (i.e. in `~/Sites/`, put a symlink to this repo). We assume that
http://localhost/shook now works

3) Install mysql database (make sure db `shookfm_wp01` exists first, and that you have a dump.sql from production - see above)
```
sed "s/http:\/\/www.shook.fm/http:\/\/localhost\/shook/g" dump.sql > temp.sql;
mysql --max_allowed_packet=512M -uroot -proot shookfm_wp01 < temp.sql
```
If problem, run this from the mysql commandline:
```
set global net_buffer_length=1000000; 
set global max_allowed_packet=1000000000;
```

4) Config file
```
cp wp-config.ben-local.php wp-config.php
```

5) Htaccess
```
cp .htaccess.ben-local .htaccess
```







