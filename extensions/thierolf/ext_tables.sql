#
# Table structure for table 'sys_file_reference'
#
CREATE TABLE sys_file_reference (
    tile_format varchar(20) DEFAULT '' NOT NULL
);

#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
    teaserimage int(10) DEFAULT '0' NOT NULL,
    space_start_class VARCHAR(255) DEFAULT '' NOT NULL,
    space_end_class VARCHAR(255) DEFAULT '' NOT NULL
);
