#
# Table structure for table 'sys_file_reference'
#
CREATE TABLE sys_file_reference (
    tile_format varchar(20) DEFAULT '' NOT NULL,
    positionclass varchar(255) DEFAULT '' NOT NULL,
    additionalcontent text DEFAULT '' NOT NULL,
);

#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
    teaserimage int(10) DEFAULT '0' NOT NULL,
    space_start_class VARCHAR(255) DEFAULT '' NOT NULL,
    space_end_class VARCHAR(255) DEFAULT '' NOT NULL,
    background_color VARCHAR(255) DEFAULT '' NOT NULL,
    pages_mobile text NULL,
);

#
# Table structure for table 'pages'
#
CREATE TABLE pages (
    fa_icon_name VARCHAR(255) DEFAULT '' NOT NULL,
    theme VARCHAR(255) DEFAULT '' NOT NULL,
    custom_icon  int(10) DEFAULT '0' NOT NULL,
);

