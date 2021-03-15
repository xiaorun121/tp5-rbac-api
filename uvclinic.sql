/*
 Navicat MySQL Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : shwap

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 15/03/2021 16:03:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for uvclinic_center
-- ----------------------------
DROP TABLE IF EXISTS `uvclinic_center`;
CREATE TABLE `uvclinic_center`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '中心名称',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '中心描述',
  `create_date` datetime(0) NULL DEFAULT NULL,
  `update_date` datetime(0) NULL DEFAULT NULL,
  `create_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '新建人员',
  `update_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '操作人员',
  `sort` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of uvclinic_center
-- ----------------------------
INSERT INTO `uvclinic_center` VALUES (1, '上海全景医学影像诊断中心有限公司', '上海全景医学影像诊断中心有限公司', NULL, '2021-02-03 11:20:39', NULL, NULL, 1);
INSERT INTO `uvclinic_center` VALUES (2, '北京全景医学影像诊断中心', '北京全景医学影像诊断中心', NULL, '2021-02-03 11:20:50', NULL, NULL, 2);
INSERT INTO `uvclinic_center` VALUES (3, '杭州全景医学影像诊断中心', '杭州全景医学影像诊断中心', NULL, '2021-02-03 11:20:56', NULL, NULL, 3);
INSERT INTO `uvclinic_center` VALUES (8, '1', '1', '2021-02-03 11:30:17', NULL, NULL, NULL, 4);

-- ----------------------------
-- Table structure for uvclinic_center_assessment_type
-- ----------------------------
DROP TABLE IF EXISTS `uvclinic_center_assessment_type`;
CREATE TABLE `uvclinic_center_assessment_type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '中心考核名称',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '中心考核描述',
  `create_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '操作人员',
  `create_date` datetime(0) NULL DEFAULT NULL,
  `update_date` datetime(0) NULL DEFAULT NULL,
  `update_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '修改人员',
  `sort` int(11) NULL DEFAULT 0 COMMENT '排序',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of uvclinic_center_assessment_type
-- ----------------------------
INSERT INTO `uvclinic_center_assessment_type` VALUES (1, '您认为该中心今天的业绩怎么样？', '您认为该中心今天的业绩怎么样？', NULL, '2021-02-03 10:40:22', '2021-02-03 11:15:44', NULL, 1);
INSERT INTO `uvclinic_center_assessment_type` VALUES (3, '您认为该中心服务态度怎么样?', '您认为该中心服务态度怎么样?', NULL, '2021-02-03 11:15:53', '2021-02-03 11:33:15', NULL, 2);

-- ----------------------------
-- Table structure for uvclinic_city
-- ----------------------------
DROP TABLE IF EXISTS `uvclinic_city`;
CREATE TABLE `uvclinic_city`  (
  `id` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `province_id` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '市级城市' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of uvclinic_city
-- ----------------------------
INSERT INTO `uvclinic_city` VALUES ('1', '北京市', '1');
INSERT INTO `uvclinic_city` VALUES ('2', '天津市', '2');
INSERT INTO `uvclinic_city` VALUES ('3', '上海市', '3');
INSERT INTO `uvclinic_city` VALUES ('4', '重庆市', '4');
INSERT INTO `uvclinic_city` VALUES ('5', '石家庄市', '5');
INSERT INTO `uvclinic_city` VALUES ('6', '唐山市', '5');
INSERT INTO `uvclinic_city` VALUES ('7', '秦皇岛市', '5');
INSERT INTO `uvclinic_city` VALUES ('8', '邯郸市', '5');
INSERT INTO `uvclinic_city` VALUES ('9', '邢台市', '5');
INSERT INTO `uvclinic_city` VALUES ('10', '保定市', '5');
INSERT INTO `uvclinic_city` VALUES ('11', '张家口市', '5');
INSERT INTO `uvclinic_city` VALUES ('12', '承德市', '5');
INSERT INTO `uvclinic_city` VALUES ('13', '沧州市', '5');
INSERT INTO `uvclinic_city` VALUES ('14', '廊坊市', '5');
INSERT INTO `uvclinic_city` VALUES ('15', '衡水市', '5');
INSERT INTO `uvclinic_city` VALUES ('16', '太原市', '6');
INSERT INTO `uvclinic_city` VALUES ('17', '大同市', '6');
INSERT INTO `uvclinic_city` VALUES ('18', '阳泉市', '6');
INSERT INTO `uvclinic_city` VALUES ('19', '长治市', '6');
INSERT INTO `uvclinic_city` VALUES ('20', '晋城市', '6');
INSERT INTO `uvclinic_city` VALUES ('21', '朔州市', '6');
INSERT INTO `uvclinic_city` VALUES ('22', '晋中市', '6');
INSERT INTO `uvclinic_city` VALUES ('23', '运城市', '6');
INSERT INTO `uvclinic_city` VALUES ('24', '忻州市', '6');
INSERT INTO `uvclinic_city` VALUES ('25', '临汾市', '6');
INSERT INTO `uvclinic_city` VALUES ('26', '吕梁市', '6');
INSERT INTO `uvclinic_city` VALUES ('27', '台北市', '7');
INSERT INTO `uvclinic_city` VALUES ('28', '高雄市', '7');
INSERT INTO `uvclinic_city` VALUES ('29', '基隆市', '7');
INSERT INTO `uvclinic_city` VALUES ('30', '台中市', '7');
INSERT INTO `uvclinic_city` VALUES ('31', '台南市', '7');
INSERT INTO `uvclinic_city` VALUES ('32', '新竹市', '7');
INSERT INTO `uvclinic_city` VALUES ('33', '嘉义市', '7');
INSERT INTO `uvclinic_city` VALUES ('34', '台北县', '7');
INSERT INTO `uvclinic_city` VALUES ('35', '宜兰县', '7');
INSERT INTO `uvclinic_city` VALUES ('36', '桃园县', '7');
INSERT INTO `uvclinic_city` VALUES ('37', '新竹县', '7');
INSERT INTO `uvclinic_city` VALUES ('38', '苗栗县', '7');
INSERT INTO `uvclinic_city` VALUES ('39', '台中县', '7');
INSERT INTO `uvclinic_city` VALUES ('40', '彰化县', '7');
INSERT INTO `uvclinic_city` VALUES ('41', '南投县', '7');
INSERT INTO `uvclinic_city` VALUES ('42', '云林县', '7');
INSERT INTO `uvclinic_city` VALUES ('43', '嘉义县', '7');
INSERT INTO `uvclinic_city` VALUES ('44', '台南县', '7');
INSERT INTO `uvclinic_city` VALUES ('45', '高雄县', '7');
INSERT INTO `uvclinic_city` VALUES ('46', '屏东县', '7');
INSERT INTO `uvclinic_city` VALUES ('47', '澎湖县', '7');
INSERT INTO `uvclinic_city` VALUES ('48', '台东县', '7');
INSERT INTO `uvclinic_city` VALUES ('49', '花莲县', '7');
INSERT INTO `uvclinic_city` VALUES ('50', '沈阳市', '8');
INSERT INTO `uvclinic_city` VALUES ('51', '大连市', '8');
INSERT INTO `uvclinic_city` VALUES ('52', '鞍山市', '8');
INSERT INTO `uvclinic_city` VALUES ('53', '抚顺市', '8');
INSERT INTO `uvclinic_city` VALUES ('54', '本溪市', '8');
INSERT INTO `uvclinic_city` VALUES ('55', '丹东市', '8');
INSERT INTO `uvclinic_city` VALUES ('56', '锦州市', '8');
INSERT INTO `uvclinic_city` VALUES ('57', '营口市', '8');
INSERT INTO `uvclinic_city` VALUES ('58', '阜新市', '8');
INSERT INTO `uvclinic_city` VALUES ('59', '辽阳市', '8');
INSERT INTO `uvclinic_city` VALUES ('60', '盘锦市', '8');
INSERT INTO `uvclinic_city` VALUES ('61', '铁岭市', '8');
INSERT INTO `uvclinic_city` VALUES ('62', '朝阳市', '8');
INSERT INTO `uvclinic_city` VALUES ('63', '葫芦岛市', '8');
INSERT INTO `uvclinic_city` VALUES ('64', '长春市', '9');
INSERT INTO `uvclinic_city` VALUES ('65', '吉林市', '9');
INSERT INTO `uvclinic_city` VALUES ('66', '四平市', '9');
INSERT INTO `uvclinic_city` VALUES ('67', '辽源市', '9');
INSERT INTO `uvclinic_city` VALUES ('68', '通化市', '9');
INSERT INTO `uvclinic_city` VALUES ('69', '白山市', '9');
INSERT INTO `uvclinic_city` VALUES ('70', '松原市', '9');
INSERT INTO `uvclinic_city` VALUES ('71', '白城市', '9');
INSERT INTO `uvclinic_city` VALUES ('72', '延边朝鲜族自治州', '9');
INSERT INTO `uvclinic_city` VALUES ('73', '哈尔滨市', '10');
INSERT INTO `uvclinic_city` VALUES ('74', '齐齐哈尔市', '10');
INSERT INTO `uvclinic_city` VALUES ('75', '鹤岗市', '10');
INSERT INTO `uvclinic_city` VALUES ('76', '双鸭山市', '10');
INSERT INTO `uvclinic_city` VALUES ('77', '鸡西市', '10');
INSERT INTO `uvclinic_city` VALUES ('78', '大庆市', '10');
INSERT INTO `uvclinic_city` VALUES ('79', '伊春市', '10');
INSERT INTO `uvclinic_city` VALUES ('80', '牡丹江市', '10');
INSERT INTO `uvclinic_city` VALUES ('81', '佳木斯市', '10');
INSERT INTO `uvclinic_city` VALUES ('82', '七台河市', '10');
INSERT INTO `uvclinic_city` VALUES ('83', '黑河市', '10');
INSERT INTO `uvclinic_city` VALUES ('84', '绥化市', '10');
INSERT INTO `uvclinic_city` VALUES ('85', '大兴安岭地区', '10');
INSERT INTO `uvclinic_city` VALUES ('86', '南京市', '11');
INSERT INTO `uvclinic_city` VALUES ('87', '无锡市', '11');
INSERT INTO `uvclinic_city` VALUES ('88', '徐州市', '11');
INSERT INTO `uvclinic_city` VALUES ('89', '常州市', '11');
INSERT INTO `uvclinic_city` VALUES ('90', '苏州市', '11');
INSERT INTO `uvclinic_city` VALUES ('91', '南通市', '11');
INSERT INTO `uvclinic_city` VALUES ('92', '连云港市', '11');
INSERT INTO `uvclinic_city` VALUES ('93', '淮安市', '11');
INSERT INTO `uvclinic_city` VALUES ('94', '盐城市', '11');
INSERT INTO `uvclinic_city` VALUES ('95', '扬州市', '11');
INSERT INTO `uvclinic_city` VALUES ('96', '镇江市', '11');
INSERT INTO `uvclinic_city` VALUES ('97', '泰州市', '11');
INSERT INTO `uvclinic_city` VALUES ('98', '宿迁市', '11');
INSERT INTO `uvclinic_city` VALUES ('99', '杭州市', '12');
INSERT INTO `uvclinic_city` VALUES ('100', '宁波市', '12');
INSERT INTO `uvclinic_city` VALUES ('101', '温州市', '12');
INSERT INTO `uvclinic_city` VALUES ('102', '嘉兴市', '12');
INSERT INTO `uvclinic_city` VALUES ('103', '湖州市', '12');
INSERT INTO `uvclinic_city` VALUES ('104', '绍兴市', '12');
INSERT INTO `uvclinic_city` VALUES ('105', '金华市', '12');
INSERT INTO `uvclinic_city` VALUES ('106', '衢州市', '12');
INSERT INTO `uvclinic_city` VALUES ('107', '舟山市', '12');
INSERT INTO `uvclinic_city` VALUES ('108', '台州市', '12');
INSERT INTO `uvclinic_city` VALUES ('109', '丽水市', '12');
INSERT INTO `uvclinic_city` VALUES ('110', '合肥市', '13');
INSERT INTO `uvclinic_city` VALUES ('111', '芜湖市', '13');
INSERT INTO `uvclinic_city` VALUES ('112', '蚌埠市', '13');
INSERT INTO `uvclinic_city` VALUES ('113', '淮南市', '13');
INSERT INTO `uvclinic_city` VALUES ('114', '马鞍山市', '13');
INSERT INTO `uvclinic_city` VALUES ('115', '淮北市', '13');
INSERT INTO `uvclinic_city` VALUES ('116', '铜陵市', '13');
INSERT INTO `uvclinic_city` VALUES ('117', '安庆市', '13');
INSERT INTO `uvclinic_city` VALUES ('118', '黄山市', '13');
INSERT INTO `uvclinic_city` VALUES ('119', '滁州市', '13');
INSERT INTO `uvclinic_city` VALUES ('120', '阜阳市', '13');
INSERT INTO `uvclinic_city` VALUES ('121', '宿州市', '13');
INSERT INTO `uvclinic_city` VALUES ('122', '巢湖市', '13');
INSERT INTO `uvclinic_city` VALUES ('123', '六安市', '13');
INSERT INTO `uvclinic_city` VALUES ('124', '亳州市', '13');
INSERT INTO `uvclinic_city` VALUES ('125', '池州市', '13');
INSERT INTO `uvclinic_city` VALUES ('126', '宣城市', '13');
INSERT INTO `uvclinic_city` VALUES ('127', '福州市', '14');
INSERT INTO `uvclinic_city` VALUES ('128', '厦门市', '14');
INSERT INTO `uvclinic_city` VALUES ('129', '莆田市', '14');
INSERT INTO `uvclinic_city` VALUES ('130', '三明市', '14');
INSERT INTO `uvclinic_city` VALUES ('131', '泉州市', '14');
INSERT INTO `uvclinic_city` VALUES ('132', '漳州市', '14');
INSERT INTO `uvclinic_city` VALUES ('133', '南平市', '14');
INSERT INTO `uvclinic_city` VALUES ('134', '龙岩市', '14');
INSERT INTO `uvclinic_city` VALUES ('135', '宁德市', '14');
INSERT INTO `uvclinic_city` VALUES ('136', '南昌市', '15');
INSERT INTO `uvclinic_city` VALUES ('137', '景德镇市', '15');
INSERT INTO `uvclinic_city` VALUES ('138', '萍乡市', '15');
INSERT INTO `uvclinic_city` VALUES ('139', '九江市', '15');
INSERT INTO `uvclinic_city` VALUES ('140', '新余市', '15');
INSERT INTO `uvclinic_city` VALUES ('141', '鹰潭市', '15');
INSERT INTO `uvclinic_city` VALUES ('142', '赣州市', '15');
INSERT INTO `uvclinic_city` VALUES ('143', '吉安市', '15');
INSERT INTO `uvclinic_city` VALUES ('144', '宜春市', '15');
INSERT INTO `uvclinic_city` VALUES ('145', '抚州市', '15');
INSERT INTO `uvclinic_city` VALUES ('146', '上饶市', '15');
INSERT INTO `uvclinic_city` VALUES ('147', '济南市', '16');
INSERT INTO `uvclinic_city` VALUES ('148', '青岛市', '16');
INSERT INTO `uvclinic_city` VALUES ('149', '淄博市', '16');
INSERT INTO `uvclinic_city` VALUES ('150', '枣庄市', '16');
INSERT INTO `uvclinic_city` VALUES ('151', '东营市', '16');
INSERT INTO `uvclinic_city` VALUES ('152', '烟台市', '16');
INSERT INTO `uvclinic_city` VALUES ('153', '潍坊市', '16');
INSERT INTO `uvclinic_city` VALUES ('154', '济宁市', '16');
INSERT INTO `uvclinic_city` VALUES ('155', '泰安市', '16');
INSERT INTO `uvclinic_city` VALUES ('156', '威海市', '16');
INSERT INTO `uvclinic_city` VALUES ('157', '日照市', '16');
INSERT INTO `uvclinic_city` VALUES ('158', '莱芜市', '16');
INSERT INTO `uvclinic_city` VALUES ('159', '临沂市', '16');
INSERT INTO `uvclinic_city` VALUES ('160', '德州市', '16');
INSERT INTO `uvclinic_city` VALUES ('161', '聊城市', '16');
INSERT INTO `uvclinic_city` VALUES ('162', '滨州市', '16');
INSERT INTO `uvclinic_city` VALUES ('163', '菏泽市', '16');
INSERT INTO `uvclinic_city` VALUES ('164', '郑州市', '17');
INSERT INTO `uvclinic_city` VALUES ('165', '开封市', '17');
INSERT INTO `uvclinic_city` VALUES ('166', '洛阳市', '17');
INSERT INTO `uvclinic_city` VALUES ('167', '平顶山市', '17');
INSERT INTO `uvclinic_city` VALUES ('168', '安阳市', '17');
INSERT INTO `uvclinic_city` VALUES ('169', '鹤壁市', '17');
INSERT INTO `uvclinic_city` VALUES ('170', '新乡市', '17');
INSERT INTO `uvclinic_city` VALUES ('171', '焦作市', '17');
INSERT INTO `uvclinic_city` VALUES ('172', '濮阳市', '17');
INSERT INTO `uvclinic_city` VALUES ('173', '许昌市', '17');
INSERT INTO `uvclinic_city` VALUES ('174', '漯河市', '17');
INSERT INTO `uvclinic_city` VALUES ('175', '三门峡市', '17');
INSERT INTO `uvclinic_city` VALUES ('176', '南阳市', '17');
INSERT INTO `uvclinic_city` VALUES ('177', '商丘市', '17');
INSERT INTO `uvclinic_city` VALUES ('178', '信阳市', '17');
INSERT INTO `uvclinic_city` VALUES ('179', '周口市', '17');
INSERT INTO `uvclinic_city` VALUES ('180', '驻马店市', '17');
INSERT INTO `uvclinic_city` VALUES ('181', '济源市', '17');
INSERT INTO `uvclinic_city` VALUES ('182', '武汉市', '18');
INSERT INTO `uvclinic_city` VALUES ('183', '黄石市', '18');
INSERT INTO `uvclinic_city` VALUES ('184', '十堰市', '18');
INSERT INTO `uvclinic_city` VALUES ('185', '荆州市', '18');
INSERT INTO `uvclinic_city` VALUES ('186', '宜昌市', '18');
INSERT INTO `uvclinic_city` VALUES ('187', '襄樊市', '18');
INSERT INTO `uvclinic_city` VALUES ('188', '鄂州市', '18');
INSERT INTO `uvclinic_city` VALUES ('189', '荆门市', '18');
INSERT INTO `uvclinic_city` VALUES ('190', '孝感市', '18');
INSERT INTO `uvclinic_city` VALUES ('191', '黄冈市', '18');
INSERT INTO `uvclinic_city` VALUES ('192', '咸宁市', '18');
INSERT INTO `uvclinic_city` VALUES ('193', '随州市', '18');
INSERT INTO `uvclinic_city` VALUES ('194', '仙桃市', '18');
INSERT INTO `uvclinic_city` VALUES ('195', '天门市', '18');
INSERT INTO `uvclinic_city` VALUES ('196', '潜江市', '18');
INSERT INTO `uvclinic_city` VALUES ('197', '神农架林区', '18');
INSERT INTO `uvclinic_city` VALUES ('198', '恩施土家族苗族自治州', '18');
INSERT INTO `uvclinic_city` VALUES ('199', '长沙市', '19');
INSERT INTO `uvclinic_city` VALUES ('200', '株洲市', '19');
INSERT INTO `uvclinic_city` VALUES ('201', '湘潭市', '19');
INSERT INTO `uvclinic_city` VALUES ('202', '衡阳市', '19');
INSERT INTO `uvclinic_city` VALUES ('203', '邵阳市', '19');
INSERT INTO `uvclinic_city` VALUES ('204', '岳阳市', '19');
INSERT INTO `uvclinic_city` VALUES ('205', '常德市', '19');
INSERT INTO `uvclinic_city` VALUES ('206', '张家界市', '19');
INSERT INTO `uvclinic_city` VALUES ('207', '益阳市', '19');
INSERT INTO `uvclinic_city` VALUES ('208', '郴州市', '19');
INSERT INTO `uvclinic_city` VALUES ('209', '永州市', '19');
INSERT INTO `uvclinic_city` VALUES ('210', '怀化市', '19');
INSERT INTO `uvclinic_city` VALUES ('211', '娄底市', '19');
INSERT INTO `uvclinic_city` VALUES ('212', '湘西土家族苗族自治州', '19');
INSERT INTO `uvclinic_city` VALUES ('213', '广州市', '20');
INSERT INTO `uvclinic_city` VALUES ('214', '深圳市', '20');
INSERT INTO `uvclinic_city` VALUES ('215', '珠海市', '20');
INSERT INTO `uvclinic_city` VALUES ('216', '汕头市', '20');
INSERT INTO `uvclinic_city` VALUES ('217', '韶关市', '20');
INSERT INTO `uvclinic_city` VALUES ('218', '佛山市', '20');
INSERT INTO `uvclinic_city` VALUES ('219', '江门市', '20');
INSERT INTO `uvclinic_city` VALUES ('220', '湛江市', '20');
INSERT INTO `uvclinic_city` VALUES ('221', '茂名市', '20');
INSERT INTO `uvclinic_city` VALUES ('222', '肇庆市', '20');
INSERT INTO `uvclinic_city` VALUES ('223', '惠州市', '20');
INSERT INTO `uvclinic_city` VALUES ('224', '梅州市', '20');
INSERT INTO `uvclinic_city` VALUES ('225', '汕尾市', '20');
INSERT INTO `uvclinic_city` VALUES ('226', '河源市', '20');
INSERT INTO `uvclinic_city` VALUES ('227', '阳江市', '20');
INSERT INTO `uvclinic_city` VALUES ('228', '清远市', '20');
INSERT INTO `uvclinic_city` VALUES ('229', '东莞市', '20');
INSERT INTO `uvclinic_city` VALUES ('230', '中山市', '20');
INSERT INTO `uvclinic_city` VALUES ('231', '潮州市', '20');
INSERT INTO `uvclinic_city` VALUES ('232', '揭阳市', '20');
INSERT INTO `uvclinic_city` VALUES ('233', '云浮市', '20');
INSERT INTO `uvclinic_city` VALUES ('234', '兰州市', '21');
INSERT INTO `uvclinic_city` VALUES ('235', '金昌市', '21');
INSERT INTO `uvclinic_city` VALUES ('236', '白银市', '21');
INSERT INTO `uvclinic_city` VALUES ('237', '天水市', '21');
INSERT INTO `uvclinic_city` VALUES ('238', '嘉峪关市', '21');
INSERT INTO `uvclinic_city` VALUES ('239', '武威市', '21');
INSERT INTO `uvclinic_city` VALUES ('240', '张掖市', '21');
INSERT INTO `uvclinic_city` VALUES ('241', '平凉市', '21');
INSERT INTO `uvclinic_city` VALUES ('242', '酒泉市', '21');
INSERT INTO `uvclinic_city` VALUES ('243', '庆阳市', '21');
INSERT INTO `uvclinic_city` VALUES ('244', '定西市', '21');
INSERT INTO `uvclinic_city` VALUES ('245', '陇南市', '21');
INSERT INTO `uvclinic_city` VALUES ('246', '临夏回族自治州', '21');
INSERT INTO `uvclinic_city` VALUES ('247', '甘南藏族自治州', '21');
INSERT INTO `uvclinic_city` VALUES ('248', '成都市', '22');
INSERT INTO `uvclinic_city` VALUES ('249', '自贡市', '22');
INSERT INTO `uvclinic_city` VALUES ('250', '攀枝花市', '22');
INSERT INTO `uvclinic_city` VALUES ('251', '泸州市', '22');
INSERT INTO `uvclinic_city` VALUES ('252', '德阳市', '22');
INSERT INTO `uvclinic_city` VALUES ('253', '绵阳市', '22');
INSERT INTO `uvclinic_city` VALUES ('254', '广元市', '22');
INSERT INTO `uvclinic_city` VALUES ('255', '遂宁市', '22');
INSERT INTO `uvclinic_city` VALUES ('256', '内江市', '22');
INSERT INTO `uvclinic_city` VALUES ('257', '乐山市', '22');
INSERT INTO `uvclinic_city` VALUES ('258', '南充市', '22');
INSERT INTO `uvclinic_city` VALUES ('259', '眉山市', '22');
INSERT INTO `uvclinic_city` VALUES ('260', '宜宾市', '22');
INSERT INTO `uvclinic_city` VALUES ('261', '广安市', '22');
INSERT INTO `uvclinic_city` VALUES ('262', '达州市', '22');
INSERT INTO `uvclinic_city` VALUES ('263', '雅安市', '22');
INSERT INTO `uvclinic_city` VALUES ('264', '巴中市', '22');
INSERT INTO `uvclinic_city` VALUES ('265', '资阳市', '22');
INSERT INTO `uvclinic_city` VALUES ('266', '阿坝藏族羌族自治州', '22');
INSERT INTO `uvclinic_city` VALUES ('267', '甘孜藏族自治州', '22');
INSERT INTO `uvclinic_city` VALUES ('268', '凉山彝族自治州', '22');
INSERT INTO `uvclinic_city` VALUES ('269', '贵阳市', '23');
INSERT INTO `uvclinic_city` VALUES ('270', '六盘水市', '23');
INSERT INTO `uvclinic_city` VALUES ('271', '遵义市', '23');
INSERT INTO `uvclinic_city` VALUES ('272', '安顺市', '23');
INSERT INTO `uvclinic_city` VALUES ('273', '铜仁地区', '23');
INSERT INTO `uvclinic_city` VALUES ('274', '毕节地区', '23');
INSERT INTO `uvclinic_city` VALUES ('275', '黔西南布依族苗族自治州', '23');
INSERT INTO `uvclinic_city` VALUES ('276', '黔东南苗族侗族自治州', '23');
INSERT INTO `uvclinic_city` VALUES ('277', '黔南布依族苗族自治州', '23');
INSERT INTO `uvclinic_city` VALUES ('278', '海口市', '24');
INSERT INTO `uvclinic_city` VALUES ('279', '三亚市', '24');
INSERT INTO `uvclinic_city` VALUES ('280', '五指山市', '24');
INSERT INTO `uvclinic_city` VALUES ('281', '琼海市', '24');
INSERT INTO `uvclinic_city` VALUES ('282', '儋州市', '24');
INSERT INTO `uvclinic_city` VALUES ('283', '文昌市', '24');
INSERT INTO `uvclinic_city` VALUES ('284', '万宁市', '24');
INSERT INTO `uvclinic_city` VALUES ('285', '东方市', '24');
INSERT INTO `uvclinic_city` VALUES ('286', '澄迈县', '24');
INSERT INTO `uvclinic_city` VALUES ('287', '定安县', '24');
INSERT INTO `uvclinic_city` VALUES ('288', '屯昌县', '24');
INSERT INTO `uvclinic_city` VALUES ('289', '临高县', '24');
INSERT INTO `uvclinic_city` VALUES ('290', '白沙黎族自治县', '24');
INSERT INTO `uvclinic_city` VALUES ('291', '昌江黎族自治县', '24');
INSERT INTO `uvclinic_city` VALUES ('292', '乐东黎族自治县', '24');
INSERT INTO `uvclinic_city` VALUES ('293', '陵水黎族自治县', '24');
INSERT INTO `uvclinic_city` VALUES ('294', '保亭黎族苗族自治县', '24');
INSERT INTO `uvclinic_city` VALUES ('295', '琼中黎族苗族自治县', '24');
INSERT INTO `uvclinic_city` VALUES ('296', '昆明市', '25');
INSERT INTO `uvclinic_city` VALUES ('297', '曲靖市', '25');
INSERT INTO `uvclinic_city` VALUES ('298', '玉溪市', '25');
INSERT INTO `uvclinic_city` VALUES ('299', '保山市', '25');
INSERT INTO `uvclinic_city` VALUES ('300', '昭通市', '25');
INSERT INTO `uvclinic_city` VALUES ('301', '丽江市', '25');
INSERT INTO `uvclinic_city` VALUES ('302', '思茅市', '25');
INSERT INTO `uvclinic_city` VALUES ('303', '临沧市', '25');
INSERT INTO `uvclinic_city` VALUES ('304', '文山壮族苗族自治州', '25');
INSERT INTO `uvclinic_city` VALUES ('305', '红河哈尼族彝族自治州', '25');
INSERT INTO `uvclinic_city` VALUES ('306', '西双版纳傣族自治州', '25');
INSERT INTO `uvclinic_city` VALUES ('307', '楚雄彝族自治州', '25');
INSERT INTO `uvclinic_city` VALUES ('308', '大理白族自治州', '25');
INSERT INTO `uvclinic_city` VALUES ('309', '德宏傣族景颇族自治州', '25');
INSERT INTO `uvclinic_city` VALUES ('310', '怒江傈傈族自治州', '25');
INSERT INTO `uvclinic_city` VALUES ('311', '迪庆藏族自治州', '25');
INSERT INTO `uvclinic_city` VALUES ('312', '西宁市', '26');
INSERT INTO `uvclinic_city` VALUES ('313', '海东地区', '26');
INSERT INTO `uvclinic_city` VALUES ('314', '海北藏族自治州', '26');
INSERT INTO `uvclinic_city` VALUES ('315', '黄南藏族自治州', '26');
INSERT INTO `uvclinic_city` VALUES ('316', '海南藏族自治州', '26');
INSERT INTO `uvclinic_city` VALUES ('317', '果洛藏族自治州', '26');
INSERT INTO `uvclinic_city` VALUES ('318', '玉树藏族自治州', '26');
INSERT INTO `uvclinic_city` VALUES ('319', '海西蒙古族藏族自治州', '26');
INSERT INTO `uvclinic_city` VALUES ('320', '西安市', '27');
INSERT INTO `uvclinic_city` VALUES ('321', '铜川市', '27');
INSERT INTO `uvclinic_city` VALUES ('322', '宝鸡市', '27');
INSERT INTO `uvclinic_city` VALUES ('323', '咸阳市', '27');
INSERT INTO `uvclinic_city` VALUES ('324', '渭南市', '27');
INSERT INTO `uvclinic_city` VALUES ('325', '延安市', '27');
INSERT INTO `uvclinic_city` VALUES ('326', '汉中市', '27');
INSERT INTO `uvclinic_city` VALUES ('327', '榆林市', '27');
INSERT INTO `uvclinic_city` VALUES ('328', '安康市', '27');
INSERT INTO `uvclinic_city` VALUES ('329', '商洛市', '27');
INSERT INTO `uvclinic_city` VALUES ('330', '南宁市', '28');
INSERT INTO `uvclinic_city` VALUES ('331', '柳州市', '28');
INSERT INTO `uvclinic_city` VALUES ('332', '桂林市', '28');
INSERT INTO `uvclinic_city` VALUES ('333', '梧州市', '28');
INSERT INTO `uvclinic_city` VALUES ('334', '北海市', '28');
INSERT INTO `uvclinic_city` VALUES ('335', '防城港市', '28');
INSERT INTO `uvclinic_city` VALUES ('336', '钦州市', '28');
INSERT INTO `uvclinic_city` VALUES ('337', '贵港市', '28');
INSERT INTO `uvclinic_city` VALUES ('338', '玉林市', '28');
INSERT INTO `uvclinic_city` VALUES ('339', '百色市', '28');
INSERT INTO `uvclinic_city` VALUES ('340', '贺州市', '28');
INSERT INTO `uvclinic_city` VALUES ('341', '河池市', '28');
INSERT INTO `uvclinic_city` VALUES ('342', '来宾市', '28');
INSERT INTO `uvclinic_city` VALUES ('343', '崇左市', '28');
INSERT INTO `uvclinic_city` VALUES ('344', '拉萨市', '29');
INSERT INTO `uvclinic_city` VALUES ('345', '那曲地区', '29');
INSERT INTO `uvclinic_city` VALUES ('346', '昌都地区', '29');
INSERT INTO `uvclinic_city` VALUES ('347', '山南地区', '29');
INSERT INTO `uvclinic_city` VALUES ('348', '日喀则地区', '29');
INSERT INTO `uvclinic_city` VALUES ('349', '阿里地区', '29');
INSERT INTO `uvclinic_city` VALUES ('350', '林芝地区', '29');
INSERT INTO `uvclinic_city` VALUES ('351', '银川市', '30');
INSERT INTO `uvclinic_city` VALUES ('352', '石嘴山市', '30');
INSERT INTO `uvclinic_city` VALUES ('353', '吴忠市', '30');
INSERT INTO `uvclinic_city` VALUES ('354', '固原市', '30');
INSERT INTO `uvclinic_city` VALUES ('355', '中卫市', '30');
INSERT INTO `uvclinic_city` VALUES ('356', '乌鲁木齐市', '31');
INSERT INTO `uvclinic_city` VALUES ('357', '克拉玛依市', '31');
INSERT INTO `uvclinic_city` VALUES ('358', '石河子市', '31');
INSERT INTO `uvclinic_city` VALUES ('359', '阿拉尔市', '31');
INSERT INTO `uvclinic_city` VALUES ('360', '图木舒克市', '31');
INSERT INTO `uvclinic_city` VALUES ('361', '五家渠市', '31');
INSERT INTO `uvclinic_city` VALUES ('362', '吐鲁番市', '31');
INSERT INTO `uvclinic_city` VALUES ('363', '阿克苏市', '31');
INSERT INTO `uvclinic_city` VALUES ('364', '喀什市', '31');
INSERT INTO `uvclinic_city` VALUES ('365', '哈密市', '31');
INSERT INTO `uvclinic_city` VALUES ('366', '和田市', '31');
INSERT INTO `uvclinic_city` VALUES ('367', '阿图什市', '31');
INSERT INTO `uvclinic_city` VALUES ('368', '库尔勒市', '31');
INSERT INTO `uvclinic_city` VALUES ('369', '昌吉市', '31');
INSERT INTO `uvclinic_city` VALUES ('370', '阜康市', '31');
INSERT INTO `uvclinic_city` VALUES ('371', '米泉市', '31');
INSERT INTO `uvclinic_city` VALUES ('372', '博乐市', '31');
INSERT INTO `uvclinic_city` VALUES ('373', '伊宁市', '31');
INSERT INTO `uvclinic_city` VALUES ('374', '奎屯市', '31');
INSERT INTO `uvclinic_city` VALUES ('375', '塔城市', '31');
INSERT INTO `uvclinic_city` VALUES ('376', '乌苏市', '31');
INSERT INTO `uvclinic_city` VALUES ('377', '阿勒泰市', '31');
INSERT INTO `uvclinic_city` VALUES ('378', '呼和浩特市', '32');
INSERT INTO `uvclinic_city` VALUES ('379', '包头市', '32');
INSERT INTO `uvclinic_city` VALUES ('380', '乌海市', '32');
INSERT INTO `uvclinic_city` VALUES ('381', '赤峰市', '32');
INSERT INTO `uvclinic_city` VALUES ('382', '通辽市', '32');
INSERT INTO `uvclinic_city` VALUES ('383', '鄂尔多斯市', '32');
INSERT INTO `uvclinic_city` VALUES ('384', '呼伦贝尔市', '32');
INSERT INTO `uvclinic_city` VALUES ('385', '巴彦淖尔市', '32');
INSERT INTO `uvclinic_city` VALUES ('386', '乌兰察布市', '32');
INSERT INTO `uvclinic_city` VALUES ('387', '锡林郭勒盟', '32');
INSERT INTO `uvclinic_city` VALUES ('388', '兴安盟', '32');
INSERT INTO `uvclinic_city` VALUES ('389', '阿拉善盟', '32');
INSERT INTO `uvclinic_city` VALUES ('390', '澳门特别行政区', '33');
INSERT INTO `uvclinic_city` VALUES ('391', '香港特别行政区', '34');

-- ----------------------------
-- Table structure for uvclinic_evaluation_cycle
-- ----------------------------
DROP TABLE IF EXISTS `uvclinic_evaluation_cycle`;
CREATE TABLE `uvclinic_evaluation_cycle`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evaluation_cycle` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '考核年份',
  `create_time` datetime(0) NULL DEFAULT NULL,
  `update_time` datetime(0) NULL DEFAULT NULL,
  `delete_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 108 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '考评周期' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of uvclinic_evaluation_cycle
-- ----------------------------
INSERT INTO `uvclinic_evaluation_cycle` VALUES (1, '2021', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (2, '2022', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (3, '2023', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (4, '2024', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (5, '2025', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (6, '2026', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (7, '2027', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (8, '2028', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (9, '2029', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (10, '2030', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (11, '2031', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (12, '2032', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (13, '2033', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (14, '2034', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (15, '2035', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (16, '2036', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (17, '2037', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (18, '2038', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (19, '2039', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (20, '2040', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (21, '2041', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (22, '2042', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (23, '2043', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (24, '2044', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (25, '2045', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (26, '2046', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (27, '2047', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (28, '2048', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (29, '2049', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (30, '2050', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (31, '2051', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (32, '2052', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (33, '2053', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (34, '2054', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (35, '2055', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (36, '2056', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (37, '2057', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (38, '2058', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (39, '2059', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (40, '2060', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (41, '2061', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (42, '2062', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (43, '2063', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (44, '2064', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (45, '2065', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (46, '2066', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (47, '2067', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (48, '2068', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (49, '2069', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (50, '2070', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (51, '2071', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (52, '2072', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (53, '2073', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (54, '2074', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (55, '2075', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (56, '2076', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (57, '2077', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (58, '2078', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (59, '2079', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (60, '2080', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (61, '2081', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (62, '2082', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (63, '2083', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (64, '2084', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (65, '2085', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (66, '2086', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (67, '2087', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (68, '2088', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (69, '2089', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (70, '2090', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (71, '2091', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (72, '2092', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (73, '2093', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (74, '2094', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (75, '2095', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (76, '2096', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (77, '2097', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (78, '2098', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (79, '2099', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (80, '2100', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (81, '2101', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (82, '2102', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (83, '2103', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (84, '2104', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (85, '2105', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (86, '2106', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (87, '2107', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (88, '2108', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (89, '2109', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (90, '2110', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (91, '2111', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (92, '2112', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (93, '2113', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (94, '2114', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (95, '2115', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (96, '2116', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (97, '2117', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (98, '2118', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (99, '2119', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (100, '2120', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (101, '2121', '2021-02-25 14:54:58', '2021-02-25 14:54:58', NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (102, '2020', NULL, NULL, NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (103, '2019', NULL, NULL, NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (104, '2018', NULL, NULL, NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (105, '2017', NULL, NULL, NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (106, '2016', NULL, NULL, NULL);
INSERT INTO `uvclinic_evaluation_cycle` VALUES (107, '2015', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for uvclinic_kpi_assessment
-- ----------------------------
DROP TABLE IF EXISTS `uvclinic_kpi_assessment`;
CREATE TABLE `uvclinic_kpi_assessment`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_time` datetime(0) NULL DEFAULT NULL,
  `update_time` datetime(0) NULL DEFAULT NULL,
  `delete_time` datetime(0) NULL DEFAULT NULL,
  `quotaqywh` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '企业文化',
  `quotatdgl` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '团队管理',
  `quotazwxx` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '自我学习',
  `kpiwc` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'kpi完成',
  `glyx` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '管理要项',
  `jjfx` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '加减分项',
  `kpfhj` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '考评分合计',
  `bkhbmfzrqz` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '被考核部门负责人签字',
  `kpwyqz` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '考评委员签字',
  `zcqz` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '总裁签字',
  `quota` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'KPI指标部分',
  `department` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '部门',
  `responsible` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '部门负责人',
  `evaluation_cycle` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '考评周期',
  `kpi_department_id` int(11) NULL DEFAULT NULL COMMENT 'kpi部门id',
  `user_id` int(11) NULL DEFAULT NULL COMMENT '用户id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'kpi考核' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of uvclinic_kpi_assessment
-- ----------------------------
INSERT INTO `uvclinic_kpi_assessment` VALUES (6, '2021-03-03 11:11:48', '2021-03-03 11:11:48', NULL, '{\"dcqk\":\"2021-02\",\"mbwcbl\":\"100\",\"zxldpf\":\"30\",\"qtbmpf\":\"30\",\"khwypf\":\"40\"}', '{\"dcqk\":\"2021-02\",\"mbwcbl\":\"100\",\"zxldpf\":\"40\",\"qtbmpf\":\"40\",\"khwypf\":\"20\"}', '{\"dcqk\":\"2021-02\",\"mbwcbl\":\"100\",\"zxldpf\":\"30\",\"qtbmpf\":\"50\",\"khwypf\":\"20\"}', '100', '100', '100', '300', '董事', '测试', '杨董事长', '{\"1\":{\"qkms\":\"2021-02\",\"mbwcbl\":\"100\",\"zxldpf\":\"60\",\"qtbmpf\":\"20\",\"khwypf\":\"20\"},\"2\":{\"qkms\":\"2021-02\",\"mbwcbl\":\"100\",\"zxldpf\":\"50\",\"qtbmpf\":\"20\",\"khwypf\":\"30\"}}', '董事会办公室', '董事', '2021-02', 3, 2);
INSERT INTO `uvclinic_kpi_assessment` VALUES (5, '2021-03-03 10:58:16', '2021-03-03 11:10:05', NULL, '{\"dcqk\":\"\\u6d4b\\u8bd53\",\"mbwcbl\":\"100\",\"zxldpf\":\"40\",\"qtbmpf\":\"30\",\"khwypf\":\"30\"}', '{\"dcqk\":\"\\u6d4b\\u8bd54\",\"mbwcbl\":\"100\",\"zxldpf\":\"30\",\"qtbmpf\":\"30\",\"khwypf\":\"40\"}', '{\"dcqk\":\"\\u6d4b\\u8bd55\",\"mbwcbl\":\"100\",\"zxldpf\":\"60\",\"qtbmpf\":\"20\",\"khwypf\":\"20\"}', '100', '100', '100', '300', '董事', '测试', '杨董事长', '{\"1\":{\"qkms\":\"\\u6d4b\\u8bd51\",\"mbwcbl\":\"50\",\"zxldpf\":\"50\",\"qtbmpf\":\"20\",\"khwypf\":\"30\"},\"2\":{\"qkms\":\"\\u6d4b\\u8bd52\",\"mbwcbl\":\"70\",\"zxldpf\":\"50\",\"qtbmpf\":\"30\",\"khwypf\":\"20\"}}', '董事会办公室', '董事', '2021-01', 3, 2);

-- ----------------------------
-- Table structure for uvclinic_kpi_department
-- ----------------------------
DROP TABLE IF EXISTS `uvclinic_kpi_department`;
CREATE TABLE `uvclinic_kpi_department`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `create_time` datetime(0) NULL DEFAULT NULL,
  `update_time` datetime(0) NULL DEFAULT NULL,
  `delete_time` datetime(0) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL COMMENT '用户id',
  `sort` int(11) NULL DEFAULT NULL,
  `responsible` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '负责人',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'kpi 部门维护' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of uvclinic_kpi_department
-- ----------------------------
INSERT INTO `uvclinic_kpi_department` VALUES (1, '董事会办公室', '董事会办公室', '2021-02-23 17:18:29', '2021-02-25 11:58:13', NULL, 7, 1, '董事');
INSERT INTO `uvclinic_kpi_department` VALUES (2, '人力行政中心', '人力行政中心', '2021-02-23 17:19:05', '2021-02-25 11:45:30', NULL, 7, 2, '孙玉');
INSERT INTO `uvclinic_kpi_department` VALUES (3, '财务管理中心', '财务管理中心', '2021-02-23 17:19:14', '2021-02-23 17:19:14', NULL, 7, 3, NULL);
INSERT INTO `uvclinic_kpi_department` VALUES (4, '信息管理中心', '信息管理中心', '2021-02-23 17:19:24', '2021-02-23 17:19:24', NULL, 7, 4, NULL);
INSERT INTO `uvclinic_kpi_department` VALUES (5, '医疗管理中心', '医疗管理中心', '2021-02-23 17:19:37', '2021-02-23 17:19:37', NULL, 7, 5, NULL);
INSERT INTO `uvclinic_kpi_department` VALUES (6, '科研管理中心', '科研管理中心', '2021-02-23 17:19:47', '2021-02-23 17:19:47', NULL, 7, 6, NULL);
INSERT INTO `uvclinic_kpi_department` VALUES (7, '项目投资中心', '项目投资中心', '2021-02-23 17:19:55', '2021-02-23 17:19:55', NULL, 7, 7, NULL);
INSERT INTO `uvclinic_kpi_department` VALUES (8, '运营管理中心', '运营管理中心', '2021-02-23 17:20:05', '2021-02-23 17:20:05', NULL, 7, 8, NULL);
INSERT INTO `uvclinic_kpi_department` VALUES (9, '审计部', '审计部', '2021-02-23 17:20:18', '2021-02-23 17:20:18', NULL, 7, 9, NULL);

-- ----------------------------
-- Table structure for uvclinic_kpi_department_quota
-- ----------------------------
DROP TABLE IF EXISTS `uvclinic_kpi_department_quota`;
CREATE TABLE `uvclinic_kpi_department_quota`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `create_time` datetime(0) NULL DEFAULT NULL,
  `update_time` datetime(0) NULL DEFAULT NULL,
  `delete_time` datetime(0) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `sort` int(11) NULL DEFAULT NULL,
  `kpi_department_id` int(11) NULL DEFAULT NULL COMMENT 'kpi部门id',
  `weight` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '权重 %',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'kpi 部门指标维护' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of uvclinic_kpi_department_quota
-- ----------------------------
INSERT INTO `uvclinic_kpi_department_quota` VALUES (1, '完成招聘计划', '根据公司目标，完成2个及以上新建中心组织搭建及人员招聘，保障顺利开业（徐州、南京）。', '2021-03-03 10:43:27', '2021-03-03 11:16:25', NULL, 2, 1, 3, '30');
INSERT INTO `uvclinic_kpi_department_quota` VALUES (2, '完成培训计划', '完成1次集团储备干部培训，完成1次年度经营管理培训，每月完成1次中高层管理培训。', '2021-03-03 10:49:37', '2021-03-03 10:49:37', NULL, 2, 2, 3, '20');
INSERT INTO `uvclinic_kpi_department_quota` VALUES (3, '1', '1', '2021-03-03 11:16:42', '2021-03-03 11:16:45', '2021-03-03 11:16:45', 2, 1, 3, '1');

-- ----------------------------
-- Table structure for uvclinic_menu
-- ----------------------------
DROP TABLE IF EXISTS `uvclinic_menu`;
CREATE TABLE `uvclinic_menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '菜单名称',
  `module_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '模块名称',
  `controller_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '控制器名称',
  `view_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '试图名称',
  `parent_id` int(11) NULL DEFAULT NULL COMMENT '父级菜单，默认跟菜单',
  `is_menu` int(11) NULL DEFAULT NULL COMMENT '是否显示在菜单上（0：不显示在菜单上，1：显示在菜单上。默认显示在菜单上）',
  `create_time` datetime(0) NULL DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime(0) NULL DEFAULT NULL COMMENT '修改时间',
  `delete_time` datetime(0) NULL DEFAULT NULL COMMENT '删除时间',
  `sort` int(11) NULL DEFAULT NULL COMMENT '排序',
  `user_id` int(11) NULL DEFAULT NULL COMMENT '创建人',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 113 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '菜单表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of uvclinic_menu
-- ----------------------------
INSERT INTO `uvclinic_menu` VALUES (1, '系统管理', '', '', '', 0, 1, '2021-02-07 17:04:43', '2021-02-07 17:04:43', NULL, 1, 2);
INSERT INTO `uvclinic_menu` VALUES (2, '员工考核管理', '', '', '', 0, 0, '2021-02-07 17:20:52', '2021-03-04 09:49:44', NULL, 2, 2);
INSERT INTO `uvclinic_menu` VALUES (3, '中心考核管理', '', '', '', 0, 0, '2021-02-07 17:20:50', '2021-03-04 09:50:01', NULL, 3, 2);
INSERT INTO `uvclinic_menu` VALUES (96, '获取城市级数据', 'assessment', 'organization', 'getcity', 77, 0, '2021-03-04 14:13:24', '2021-03-04 14:13:24', NULL, 5, 2);
INSERT INTO `uvclinic_menu` VALUES (4, '用户管理', 'assessment', 'user', 'ulist', 1, 1, '2021-02-07 17:21:47', '2021-02-07 17:21:49', NULL, 4, 2);
INSERT INTO `uvclinic_menu` VALUES (5, '菜单管理', 'assessment', 'menu', 'mlist', 1, 1, '2021-02-07 17:52:08', '2021-02-07 17:52:08', NULL, 2, 2);
INSERT INTO `uvclinic_menu` VALUES (6, '角色管理', 'assessment', 'role', 'rlist', 1, 1, '2021-02-07 17:52:40', '2021-02-07 17:52:40', NULL, 3, 2);
INSERT INTO `uvclinic_menu` VALUES (7, '配置管理', 'assessment', 'admin', 'website', 1, 1, '2021-02-07 17:53:13', '2021-02-10 11:29:22', NULL, 1, 2);
INSERT INTO `uvclinic_menu` VALUES (9, '员工列表', 'assessment', 'persion', 'plist', 2, 1, '2021-02-07 17:54:54', '2021-02-07 17:54:57', NULL, 1, 2);
INSERT INTO `uvclinic_menu` VALUES (98, '员工信息', 'assessment', 'personnel', 'personnellist', 1, 1, '2021-03-05 10:11:36', '2021-03-15 12:26:13', NULL, 7, 2);
INSERT INTO `uvclinic_menu` VALUES (10, '员工考核类型', 'assessment', 'persion', 'patype', 2, 1, '2021-02-07 17:56:01', '2021-02-07 17:56:01', NULL, 2, 2);
INSERT INTO `uvclinic_menu` VALUES (11, '员工考核', 'assessment', 'persion', 'passessment', 2, 1, '2021-02-07 17:56:37', '2021-02-07 17:56:37', NULL, 3, 2);
INSERT INTO `uvclinic_menu` VALUES (12, '中心列表', 'assessment', 'center', 'clist', 3, 1, '2021-02-07 17:57:29', '2021-02-07 17:57:29', NULL, 1, 2);
INSERT INTO `uvclinic_menu` VALUES (13, '中心考核类型', 'assessment', 'center', 'ctype', 3, 1, '2021-02-07 17:57:59', '2021-02-07 17:57:59', NULL, 2, 2);
INSERT INTO `uvclinic_menu` VALUES (54, '人事管理', '', '', '', 0, 1, '2021-02-18 09:52:35', '2021-02-18 10:03:10', NULL, 3, 2);
INSERT INTO `uvclinic_menu` VALUES (50, '权限分配', 'assessment', 'permission', 'rolepermissionsetting', 6, 0, '2021-02-08 10:34:43', '2021-02-08 10:34:43', NULL, 4, 2);
INSERT INTO `uvclinic_menu` VALUES (49, '用户删除', 'assessment', 'user', 'deluser', 4, 0, '2021-02-08 10:33:05', '2021-02-08 10:33:05', NULL, 3, 2);
INSERT INTO `uvclinic_menu` VALUES (48, '用户修改', 'assessment', 'user', 'publicsaveuser', 4, 0, '2021-02-08 10:32:38', '2021-02-08 10:32:38', NULL, 2, 2);
INSERT INTO `uvclinic_menu` VALUES (47, '用户新增', 'assessment', 'user', 'publicsaveuser', 4, 0, '2021-02-08 10:32:13', '2021-02-08 10:32:13', NULL, 1, 2);
INSERT INTO `uvclinic_menu` VALUES (46, '角色删除', 'assessment', 'role', 'delrole', 6, 0, '2021-02-08 10:31:42', '2021-02-09 12:37:58', NULL, 3, 2);
INSERT INTO `uvclinic_menu` VALUES (45, '角色修改', 'assessment', 'role', 'publicsaverole', 6, 0, '2021-02-08 10:31:18', '2021-02-09 12:38:13', NULL, 2, 2);
INSERT INTO `uvclinic_menu` VALUES (41, '菜单新增', 'assessment', 'menu', 'publicsavemenu', 5, 0, '2021-02-07 19:41:07', '2021-03-01 10:22:42', NULL, 1, 2);
INSERT INTO `uvclinic_menu` VALUES (44, '角色新增', 'assessment', 'role', 'publicsaverole', 6, 0, '2021-02-08 10:28:45', '2021-02-08 10:28:45', NULL, 1, 2);
INSERT INTO `uvclinic_menu` VALUES (43, '菜单删除', 'assessment', 'menu', 'delmenu', 5, 0, '2021-02-08 10:16:56', '2021-02-08 10:26:36', NULL, 3, 2);
INSERT INTO `uvclinic_menu` VALUES (42, '菜单修改', 'assessment', 'menu', 'publicsavemenu', 5, 0, '2021-02-08 10:15:19', '2021-02-09 12:50:28', NULL, 2, 2);
INSERT INTO `uvclinic_menu` VALUES (55, '人事事务', '', '', '', 54, 1, '2021-02-18 10:02:56', '2021-02-18 10:02:56', NULL, 1, 2);
INSERT INTO `uvclinic_menu` VALUES (56, '入职办理', 'assessment', 'personal', 'enpty', 55, 1, '2021-02-18 10:07:52', '2021-02-18 10:07:52', NULL, 1, 2);
INSERT INTO `uvclinic_menu` VALUES (57, '转正办理', 'assessment', 'personal', 'become', 55, 1, '2021-02-18 10:11:04', '2021-02-18 10:11:04', NULL, 2, 2);
INSERT INTO `uvclinic_menu` VALUES (58, '调岗办理', 'assessment', 'personal', 'transfer', 55, 1, '2021-02-18 10:12:09', '2021-02-18 10:12:09', NULL, 3, 2);
INSERT INTO `uvclinic_menu` VALUES (59, '离职办理', 'assessment', 'personal', 'leave', 55, 1, '2021-02-18 10:13:05', '2021-02-18 10:13:05', NULL, 4, 2);
INSERT INTO `uvclinic_menu` VALUES (77, '组织信息', 'assessment', 'organization', 'organizationinfo', 1, 1, '2021-02-23 15:50:47', '2021-03-01 10:23:07', NULL, 4, 2);
INSERT INTO `uvclinic_menu` VALUES (78, '组织信息新增', 'assessment', 'organization', 'organizationsave', 77, 0, '2021-02-23 16:00:17', '2021-03-01 10:20:29', NULL, 1, 2);
INSERT INTO `uvclinic_menu` VALUES (67, '录入', 'assessment', 'personal', 'saveenpty', 56, 0, '2021-02-19 14:09:43', '2021-02-19 14:10:41', NULL, 1, 2);
INSERT INTO `uvclinic_menu` VALUES (68, '编辑', 'assessment', 'personal', 'saveenpty', 56, 0, '2021-02-19 14:10:30', '2021-02-19 14:10:30', NULL, 2, 2);
INSERT INTO `uvclinic_menu` VALUES (69, '删除', 'assessment', 'personal', 'delenpty', 56, 0, '2021-02-19 14:11:17', '2021-02-19 14:11:17', NULL, 3, 2);
INSERT INTO `uvclinic_menu` VALUES (70, '办理入职', 'assessment', 'personal', 'handle', 56, 0, '2021-02-19 14:14:00', '2021-02-19 14:14:00', NULL, 4, 2);
INSERT INTO `uvclinic_menu` VALUES (71, '在职员工信息维护', 'assessment', 'personal', 'employeelist', 54, 1, '2021-02-23 09:21:12', '2021-02-23 09:21:12', NULL, 2, 2);
INSERT INTO `uvclinic_menu` VALUES (72, '离职员工信息维护', 'assessment', 'personal', 'dimissioninfolist', 54, 1, '2021-02-23 09:55:25', '2021-02-23 09:55:25', NULL, 3, 2);
INSERT INTO `uvclinic_menu` VALUES (76, '绩效', 'assessment', 'persion', 'passessment', 11, 0, '2021-02-23 14:10:21', '2021-02-23 14:10:49', NULL, 1, 2);
INSERT INTO `uvclinic_menu` VALUES (79, '组织信息修改', 'assessment', 'organization', 'organizationsave', 77, 0, '2021-02-23 16:00:44', '2021-03-01 10:23:20', NULL, 2, 2);
INSERT INTO `uvclinic_menu` VALUES (80, '组织信息删除', 'assessment', 'organization', 'delorganization', 77, 0, '2021-02-23 16:01:19', '2021-03-01 10:23:35', NULL, 3, 2);
INSERT INTO `uvclinic_menu` VALUES (81, 'KPI管理', '', '', '', 0, 1, '2021-02-23 16:29:32', '2021-02-23 16:33:55', NULL, 5, 2);
INSERT INTO `uvclinic_menu` VALUES (82, 'KPI部门考核', 'assessment', 'kpi', 'kpidepartmentlist', 81, 1, '2021-02-23 16:30:21', '2021-03-02 09:30:37', NULL, 1, 2);
INSERT INTO `uvclinic_menu` VALUES (99, '职位信息新增', 'assessment', 'position', 'positionsave', 97, 0, '2021-03-05 10:32:46', '2021-03-05 10:32:46', NULL, 1, 2);
INSERT INTO `uvclinic_menu` VALUES (97, '职位信息', 'assessment', 'position', 'positioninfo', 1, 1, '2021-03-05 10:09:56', '2021-03-05 10:09:56', NULL, 6, 2);
INSERT INTO `uvclinic_menu` VALUES (86, '考核', 'assessment', 'kpi', 'kpiassessment', 82, 0, '2021-02-23 16:37:20', '2021-02-23 16:38:01', NULL, 4, 2);
INSERT INTO `uvclinic_menu` VALUES (88, 'KPI部门指标维护', 'assessment', 'kpi', 'kpidepartmentquotalist', 81, 1, '2021-02-24 09:22:51', '2021-02-24 09:26:25', NULL, 2, 2);
INSERT INTO `uvclinic_menu` VALUES (89, '部门指标新增', 'assessment', 'kpi', 'kpidepartmentquotasave', 88, 0, '2021-02-24 09:23:59', '2021-02-24 09:23:59', NULL, 1, 2);
INSERT INTO `uvclinic_menu` VALUES (90, '部门指标修改', 'assessment', 'kpi', 'kpidepartmentquotasave', 88, 0, '2021-02-24 09:27:09', '2021-02-24 10:07:32', NULL, 2, 2);
INSERT INTO `uvclinic_menu` VALUES (91, '部门指标删除', 'assessment', 'kpi', 'delkpidepartmentquota', 88, 0, '2021-02-24 09:27:51', '2021-02-24 09:27:51', NULL, 3, 2);
INSERT INTO `uvclinic_menu` VALUES (93, '导入数据', 'assessment', 'organization', 'organizationupload', 77, 0, '2021-03-01 14:43:45', '2021-03-01 15:41:22', NULL, 4, 2);
INSERT INTO `uvclinic_menu` VALUES (94, '导出数据', 'assessment', 'organization', 'organizationdownload', 77, 0, '2021-03-01 15:41:53', '2021-03-01 15:41:53', NULL, 5, 2);
INSERT INTO `uvclinic_menu` VALUES (95, '考核保存信息', 'assessment', 'kpi', 'kpiassessmentsave', 82, 0, '2021-03-03 10:58:01', '2021-03-03 10:58:01', NULL, 6, 2);
INSERT INTO `uvclinic_menu` VALUES (100, '职位信息修改', 'assessment', 'position', 'positionsave', 97, 0, '2021-03-05 10:33:05', '2021-03-05 10:33:05', NULL, 2, 2);
INSERT INTO `uvclinic_menu` VALUES (101, '职位信息删除', 'assessment', 'position', 'delposition', 97, 0, '2021-03-05 10:33:33', '2021-03-05 10:33:48', NULL, 3, 2);
INSERT INTO `uvclinic_menu` VALUES (102, '导入数据', 'assessment', 'position', 'positionupload', 97, 0, '2021-03-08 15:35:22', '2021-03-08 15:35:22', NULL, 4, 2);
INSERT INTO `uvclinic_menu` VALUES (103, '导出数据', 'assessment', 'position', 'positiondownload', 97, 0, '2021-03-08 16:20:07', '2021-03-08 16:20:07', NULL, 5, 2);
INSERT INTO `uvclinic_menu` VALUES (104, '员工信息添加', 'assessment', 'personnel', 'personnelsave', 98, 0, '2021-03-15 12:07:54', '2021-03-15 12:07:54', NULL, 1, 2);
INSERT INTO `uvclinic_menu` VALUES (105, '员工信息修改', 'assessment', 'personnel', 'personnelsave', 98, 0, '2021-03-15 12:08:16', '2021-03-15 12:08:16', NULL, 2, 2);
INSERT INTO `uvclinic_menu` VALUES (106, '删除员工信息', 'assessment', 'personnel', 'delpersonnel', 98, 0, '2021-03-15 12:08:41', '2021-03-15 12:08:41', NULL, 3, 2);
INSERT INTO `uvclinic_menu` VALUES (107, '导入数据', 'assessment', 'personnel', 'personnelupload', 98, 0, '2021-03-15 12:09:15', '2021-03-15 12:09:15', NULL, 4, 2);
INSERT INTO `uvclinic_menu` VALUES (108, '导出数据', 'assessment', 'personnel', 'personneldownload', 98, 0, '2021-03-15 12:09:38', '2021-03-15 12:09:38', NULL, 5, 2);
INSERT INTO `uvclinic_menu` VALUES (109, '员工信息公司维护', 'assessment', 'personal', 'userstocompany', 54, 1, '2021-03-15 15:07:30', '2021-03-15 15:07:30', NULL, 4, 2);
INSERT INTO `uvclinic_menu` VALUES (110, '员工信息公司维护添加', 'assessment', 'personal', 'userstocompanysave', 109, 0, '2021-03-15 15:10:23', '2021-03-15 15:10:23', NULL, 1, 2);
INSERT INTO `uvclinic_menu` VALUES (111, '员工信息公司维护修改', 'assessment', 'personal', 'userstocompanysave', 109, 0, '2021-03-15 15:10:44', '2021-03-15 15:10:44', NULL, 2, 2);
INSERT INTO `uvclinic_menu` VALUES (112, '员工信息公司维护删除', 'assessment', 'personal', 'deluserstocompany', 109, 0, '2021-03-15 15:11:18', '2021-03-15 15:11:18', NULL, 3, 2);

-- ----------------------------
-- Table structure for uvclinic_organization
-- ----------------------------
DROP TABLE IF EXISTS `uvclinic_organization`;
CREATE TABLE `uvclinic_organization`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '组织名称',
  `parent_id` int(11) NULL DEFAULT NULL COMMENT '父级组织，默认跟组织',
  `create_time` datetime(0) NULL DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime(0) NULL DEFAULT NULL COMMENT '修改时间',
  `delete_time` datetime(0) NULL DEFAULT NULL COMMENT '删除时间',
  `sort` int(11) NULL DEFAULT NULL COMMENT '排序',
  `user_id` int(11) NULL DEFAULT NULL COMMENT '创建人',
  `code` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '组织编码',
  `type` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '组织类型',
  `region_province` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '所属区域 省',
  `region_city` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '所属区域 市',
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '状态 （1 启用 0 关闭）',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '组织说明',
  `kpi_department` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '是否录入KPI考核（是   否）',
  `responsible` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '负责人',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `code`(`code`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 380 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '组织信息' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of uvclinic_organization
-- ----------------------------
INSERT INTO `uvclinic_organization` VALUES (1, '上海全景医学影像科技股份有限公司', 0, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (2, '全景集团总部', 1, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '10', '法人单位', NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (3, '董事会办公室', 2, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1001', NULL, NULL, NULL, '启用', NULL, '是', '董事');
INSERT INTO `uvclinic_organization` VALUES (6, '总裁办公室', 2, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1002', NULL, NULL, NULL, '启用', NULL, '是', NULL);
INSERT INTO `uvclinic_organization` VALUES (7, '人力行政中心', 2, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1003', NULL, NULL, NULL, '启用', NULL, '是', '孙玉');
INSERT INTO `uvclinic_organization` VALUES (8, '运营管理中心', 2, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1004', NULL, NULL, NULL, '启用', NULL, '是', NULL);
INSERT INTO `uvclinic_organization` VALUES (9, '财务管理中心', 2, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1005', NULL, NULL, NULL, '启用', NULL, '是', '邢洋');
INSERT INTO `uvclinic_organization` VALUES (10, '项目投资中心', 2, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1006', NULL, NULL, NULL, '启用', NULL, '是', NULL);
INSERT INTO `uvclinic_organization` VALUES (11, '信息管理中心', 2, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1007', NULL, NULL, NULL, '启用', NULL, '是', NULL);
INSERT INTO `uvclinic_organization` VALUES (12, '医疗管理中心', 2, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1008', NULL, NULL, NULL, '启用', NULL, '是', NULL);
INSERT INTO `uvclinic_organization` VALUES (13, '科教管理中心', 2, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1009', NULL, NULL, NULL, '启用', NULL, '是', NULL);
INSERT INTO `uvclinic_organization` VALUES (14, '审计部', 2, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1012', NULL, NULL, NULL, '启用', NULL, '是', NULL);
INSERT INTO `uvclinic_organization` VALUES (4, '上海全景医学影像诊断中心有限公司', 1, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '11', '法人单位', NULL, NULL, '启用', NULL, '是', NULL);
INSERT INTO `uvclinic_organization` VALUES (5, '院办', 4, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1101', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (15, '综合办', 4, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1102', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (16, '财务部', 4, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1103', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (17, '客服部', 4, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1104', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (18, '运营管理中心', 4, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1105', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (19, '市场组', 18, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1106', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (20, '电商组', 18, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1107', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (21, '渠道组', 18, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1108', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (22, '直销组', 18, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1109', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (23, '科研管理中心', 4, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1110', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (24, '医务部', 4, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1111', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (25, '问诊室', 24, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1112', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (26, '报告解读室', 24, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1113', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (27, '病案室', 24, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1114', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (28, '护理部', 4, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1115', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (29, '护理组', 28, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1116', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (30, '医学工程部', 4, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1117', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (31, '技师组', 4, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1118', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (32, 'PET/CT室', 4, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1119', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (33, 'PET/MR室', 4, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1120', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (34, '16排CT室', 4, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1121', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (35, '双源CT室', 4, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1122', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (36, '1.5MRI室', 4, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1123', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (37, '3.0MRI室', 4, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1124', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (38, '市场销售部', 4, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1125', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (39, '上海全景麒麟门诊部有限公司', 1, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '12', '法人单位', NULL, NULL, '启用', NULL, '是', NULL);
INSERT INTO `uvclinic_organization` VALUES (40, '门诊部', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1201', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (41, '综合办', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1202', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (42, '财务部', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1203', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (43, '客服部', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1204', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (44, '市场销售部', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1205', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (45, '市场组', 44, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1206', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (46, '电商组', 44, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1207', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (47, 'DR室', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1208', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (48, 'MG室', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1209', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (49, '总检室', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1210', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (50, '检验室', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1211', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (51, '胃镜室', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1212', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (52, '肠镜室', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1213', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (53, '心电室', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1214', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (54, '超声室', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1215', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (55, '内科', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1216', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (56, '外科', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1217', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (57, '妇科', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1218', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (58, '眼科', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1219', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (59, '耳鼻咽喉科', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1220', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (60, '口腔科', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1221', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (61, '中医科', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1222', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (62, '综合功能室', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1223', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (63, '人体成份分析室', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1224', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (64, '护理组', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1225', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (65, '病案室', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1226', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (66, '市场营销组', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1227', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (67, '院办管理', 39, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1228', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (68, '杭州全景医学影像诊断中心有限公司', 1, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '13', '法人单位', NULL, NULL, '启用', NULL, '是', NULL);
INSERT INTO `uvclinic_organization` VALUES (69, '院办', 68, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1301', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (70, '综合办', 68, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1302', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (71, '财务部', 68, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1303', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (72, '客服部', 68, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1304', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (73, '市场销售部', 68, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1305', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (74, '市场组', 73, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1306', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (75, '电商组', 73, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1307', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (76, '渠道组', 73, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1308', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (77, '直销组', 73, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1309', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (78, '科教部', 68, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1310', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (79, '医务部', 68, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1311', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (80, '问诊室', 79, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1312', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (81, '报告解读室', 79, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1313', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (82, '报告室', 79, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1314', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (83, '护理部', 68, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1315', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (84, '护理组', 83, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1316', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (85, '医学工程部', 68, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1317', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (86, '技师组', 68, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1318', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (87, 'PET/CT室', 68, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1319', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (88, 'PET/MR室', 68, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1320', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (89, '16排CT室', 68, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1321', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (90, '256排/双源CT室', 68, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1322', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (91, '1.5MRI室', 68, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1323', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (92, '3.0MRI室', 68, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1324', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (93, '研究院', 68, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1325', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (94, '超声', 68, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1326', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (95, '后勤服务', 68, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1327', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (96, '杭州全景麒麟门诊部有限公司', 1, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '15', '法人单位', NULL, NULL, '启用', NULL, '是', NULL);
INSERT INTO `uvclinic_organization` VALUES (97, '门诊部', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1501', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (98, '综合办', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1502', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (99, '财务部', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1503', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (100, '客服部', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1504', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (101, '市场销售部', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1505', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (102, '市场组', 101, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1506', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (103, '电商组', 101, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1507', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (104, '渠道组', 101, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1508', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (105, '直销组', 101, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1509', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (106, 'MG室', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1511', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (107, '总检室', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1512', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (108, '检验室', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1513', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (109, '胃镜室', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1514', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (110, '肠镜室', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1515', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (111, '心电室', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1516', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (112, '超声室', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1517', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (113, '内科', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1518', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (114, '外科', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1519', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (115, '妇科', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1520', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (116, '眼科', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1521', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (117, '耳鼻咽喉科', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1522', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (118, '口腔科', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1523', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (119, '中医科', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1524', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (120, '综合功能室', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1525', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (121, '人体成份分析室', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1526', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (122, '体检中心护理组', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1527', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (123, '报告室', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1528', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (124, '内镜科', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1529', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (125, '3楼口腔科', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1530', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (126, '6楼超声科', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1531', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (127, '药房', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1532', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (128, '医保办', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1533', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (129, '后勤服务', 96, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1534', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (130, '广州全景医疗影像科技有限公司', 1, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '16', '法人单位', NULL, NULL, '启用', NULL, '是', NULL);
INSERT INTO `uvclinic_organization` VALUES (131, '院办', 130, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1601', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (132, '综合办', 131, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1602', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (133, '财务部', 131, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1603', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (134, '客服部', 131, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1604', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (135, '市场销售部', 131, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1605', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (136, '市场组', 135, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1606', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (137, '电商组', 135, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1607', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (138, '渠道组', 135, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1608', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (139, '直销组', 135, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1609', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (140, '科教部', 131, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1610', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (141, '医务部', 131, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1611', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (142, '问诊室', 131, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1612', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (143, '报告解读室', 131, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1613', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (144, '报告室', 131, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1614', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (145, '护理部', 131, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1615', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (146, '护理组', 145, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1616', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (147, '医学工程部', 131, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1617', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (148, '技师组', 131, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1618', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (149, 'PET/CT室', 131, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1619', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (150, 'PET/MR室', 131, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1620', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (151, '16排CT室', 131, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1621', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (152, '双源CT室', 131, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1622', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (153, '1.5MRI室', 131, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1623', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (154, '3.0MRI室', 131, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1624', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (155, '超声室', 131, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1625', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (156, 'DR室', 131, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1626', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (157, 'MG室', 131, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1627', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (158, '广州全景门诊部有限公司', 1, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '17', '法人单位', NULL, NULL, '启用', NULL, '是', NULL);
INSERT INTO `uvclinic_organization` VALUES (159, '门诊部', 158, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1701', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (160, '综合办', 158, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1702', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (161, '财务部', 158, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1703', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (162, '客服部', 158, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1704', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (163, '市场销售部', 158, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1705', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (164, '市场组', 158, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1706', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (165, '电商组', 158, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1707', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (166, 'DR室', 158, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1708', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (167, 'MG室', 158, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1709', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (168, '总检室', 159, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1710', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (169, '检验室', 159, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1711', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (170, '胃镜室', 159, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1712', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (171, '肠镜室', 159, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1713', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (172, '心电室', 159, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1714', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (173, '超声室', 159, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1715', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (174, '内科', 159, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1716', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (175, '外科', 159, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1717', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (176, '妇科', 159, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1718', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (177, '眼科', 159, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1719', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (178, '耳鼻咽喉科', 159, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1720', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (179, '口腔科', 159, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1721', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (180, '中医科', 159, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1722', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (181, '综合功能室', 159, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1723', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (182, '人体成份分析室', 159, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1724', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (183, '护理组', 159, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1725', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (184, '报告室', 159, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1726', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (185, '药剂科', 159, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1727', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (186, '重庆全景红岭医学影像诊断中心有限公司', 1, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '18', '法人单位', NULL, NULL, '启用', NULL, '是', NULL);
INSERT INTO `uvclinic_organization` VALUES (187, '院办', 186, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1801', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (188, '综合办', 187, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1802', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (189, '财务部', 187, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1803', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (190, '客服部', 187, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1804', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (191, '市场销售部', 187, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1805', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (192, '市场组', 191, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1806', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (193, '电商组', 191, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1807', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (194, '渠道组', 191, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1808', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (195, '直销组', 191, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1809', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (196, '科教部', 187, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1810', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (197, '医务部', 187, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1811', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (198, '问诊室', 200, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1812', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (199, '报告解读室', 200, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1813', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (200, '报告室', 187, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1814', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (201, '护理部', 200, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1815', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (202, '护理组', 201, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1816', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (203, '医学工程部', 187, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1817', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (204, '技师组', 200, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1818', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (205, 'PET/CT室', 200, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1819', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (206, 'PET/MR室', 200, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1820', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (207, '16排CT室', 200, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1821', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (208, '双源CT室', 200, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1822', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (209, '1.5MRI室', 200, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1823', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (210, '3.0MRI室', 200, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1824', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (211, '重庆全景红岭麒麟门诊部有限公司', 1, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '19', '法人单位', NULL, NULL, '启用', NULL, '是', NULL);
INSERT INTO `uvclinic_organization` VALUES (212, '门诊部', 211, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1901', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (213, '综合办', 211, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1902', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (214, '财务部', 211, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1903', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (215, '客服部', 211, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1904', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (216, '市场销售部', 211, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1905', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (217, '市场组', 216, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1906', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (218, '电商组', 216, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1907', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (219, 'DR室', 211, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1908', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (220, 'MG室', 211, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1909', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (221, '总检室', 211, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1910', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (222, '检验室', 211, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1911', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (223, '胃镜室', 211, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1912', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (224, '肠镜室', 211, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1913', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (225, '心电室', 211, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1914', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (226, '超声室', 211, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1915', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (227, '内科', 221, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1916', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (228, '外科', 221, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1917', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (229, '妇科', 221, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1918', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (230, '眼科', 221, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1919', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (231, '耳鼻咽喉科', 221, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1920', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (232, '口腔科', 221, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1921', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (233, '中医科', 221, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1922', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (234, '综合功能室', 236, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1923', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (235, '人体成份分析室', 236, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1924', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (236, '护理组', 211, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1925', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (237, '报告室', 211, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '1926', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (238, '成都全景德康医学影像诊断中心有限公司', 1, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '20', '法人单位', NULL, NULL, '启用', NULL, '是', NULL);
INSERT INTO `uvclinic_organization` VALUES (239, '院办', 238, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '2001', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (240, '综合办', 238, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '2002', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (241, '财务部', 238, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '2003', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (242, '客服部', 238, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '2004', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (243, '市场销售部', 238, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '2005', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (244, '市场组', 243, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '2006', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (245, '电商组', 243, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '2007', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (246, '渠道组', 243, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '2008', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (247, '直销组', 243, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '2009', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (248, '科教部', 238, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '2010', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (249, '医务部', 238, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '2011', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (250, '问诊室', 249, '2021-03-03 12:35:58', '2021-03-03 12:35:58', NULL, NULL, 2, '2012', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (251, '报告解读室', 249, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2013', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (252, '报告室', 249, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2014', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (253, '护理部', 238, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2015', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (254, '护理组', 253, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2016', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (255, '医学工程部', 238, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2017', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (256, '技师组', 238, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2018', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (257, 'PET/CT室', 238, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2019', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (258, 'PET/MR室', 238, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2020', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (259, '16排CT室', 238, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2021', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (260, '双源CT室', 238, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2022', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (261, '1.5MRI室', 238, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2023', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (262, '3.0MRI室', 238, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2024', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (263, '影像组', 243, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2025', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (264, '健检组', 243, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2026', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (265, '乳腺钼靶', 238, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2027', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (266, 'DR室', 238, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2028', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (267, '成都高新全景瑞康门诊部有限公司', 1, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '21', '法人单位', NULL, NULL, '启用', NULL, '是', NULL);
INSERT INTO `uvclinic_organization` VALUES (268, '门诊部', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2101', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (269, '综合办', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2102', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (270, '财务部', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2103', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (271, '客服部', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2104', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (272, '市场销售部', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2105', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (273, '市场组', 272, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2106', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (274, '电商组', 272, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2107', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (275, 'DR室', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2108', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (276, 'MG室', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2109', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (277, '总检室', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2110', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (278, '检验室', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2111', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (279, '胃镜室', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2112', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (280, '肠镜室', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2113', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (281, '心电室', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2114', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (282, '超声室', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2115', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (283, '内科', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2116', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (284, '外科', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2117', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (285, '妇科', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2118', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (286, '眼科', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2119', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (287, '耳鼻咽喉科', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2120', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (288, '口腔科', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2121', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (289, '中医科', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2122', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (290, '综合功能室', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2123', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (291, '人体成份分析室', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2124', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (292, '护理组', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2125', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (293, '报告室', 267, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2126', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (294, '天津全景医疗影像科技有限公司', 1, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '22', '法人单位', NULL, NULL, '启用', NULL, '是', NULL);
INSERT INTO `uvclinic_organization` VALUES (295, '院办', 294, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2201', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (296, '综合办公室', 294, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2202', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (297, '财务部', 294, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2203', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (298, '销售部', 294, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2204', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (299, '客服部', 294, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2205', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (300, '医务部', 294, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2206', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (301, '护理部', 294, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2207', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (302, '核医学科', 294, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2208', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (303, '放射科', 294, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2209', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (304, '超声科', 294, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2210', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (305, '心电图室', 294, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2211', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (306, '市场部', 294, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2212', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (307, '天津全景门诊部有限公司', 1, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '23', '法人单位', NULL, NULL, '启用', NULL, '是', NULL);
INSERT INTO `uvclinic_organization` VALUES (308, '急诊科', 307, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2301', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (309, '内科', 307, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2302', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (310, '外科', 307, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2303', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (311, '妇科', 307, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2304', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (312, '中医科', 307, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2305', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (313, '护理部', 307, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2306', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (314, '检验科', 307, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2307', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (315, '医务部', 307, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2308', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (316, '上海全景云医学影像诊断有限公司', 1, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '26', '法人单位', NULL, NULL, '启用', NULL, '是', NULL);
INSERT INTO `uvclinic_organization` VALUES (317, '院办', 316, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2601', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (318, '综合办', 317, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2602', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (319, '财务部', 317, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2603', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (320, '客服部', 317, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2604', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (321, '市场销售部', 317, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2605', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (322, '市场组', 321, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2606', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (323, '电商组', 321, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2607', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (324, '渠道组', 321, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2608', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (325, '直销组', 321, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2609', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (326, '科教部', 317, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2610', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (327, '问诊室', 340, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2612', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (328, '报告解读室', 340, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2613', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (329, '报告室', 340, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2614', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (330, '护理部', 317, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2615', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (331, '护理组', 330, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2616', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (332, '医学工程部', 317, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2617', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (333, '技师组', 317, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2618', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (334, 'PET/CT室', 317, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2619', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (335, 'PET/MR室', 317, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2620', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (336, '16排CT室', 317, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2621', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (337, '双源CT室', 317, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2622', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (338, '1.5MRI室', 317, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2623', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (339, '3.0MRI室', 317, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2624', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (340, '医务部', 317, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2626', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (341, '超声科', 317, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2627', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (342, '北京全景德康医学影像诊断中心有限公司', 1, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '27', '法人单位', NULL, NULL, '启用', NULL, '是', NULL);
INSERT INTO `uvclinic_organization` VALUES (343, '院办', 342, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2701', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (344, '综合办公室', 342, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2702', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (345, '财务部', 342, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2703', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (346, '客服部', 342, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2704', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (347, '客服部', 346, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '270404', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (348, '市场销售部', 342, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2705', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (349, '市场组', 348, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2706', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (350, '文案策划', 348, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '270607', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (351, '电商组', 348, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2707', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (352, '渠道组', 348, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2708', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (353, '直销组', 348, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2709', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (354, '科教部', 342, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2710', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (355, '医务部', 342, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2711', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (356, '问诊室', 355, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2712', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (357, '报告解读室', 355, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2713', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (358, '报告室', 355, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2714', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (359, '护理部', 342, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2715', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (360, '护理组', 359, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2716', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (361, '医学工程部', 342, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2717', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (362, '技师组', 342, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2718', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (363, 'PET/CT室', 342, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2719', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (364, 'PET/MR室', 342, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2720', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (365, '16排CT室', 342, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2721', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (366, '双源CT室', 342, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2722', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (367, '1.5MRI室', 342, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2723', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (368, '3.0MRI室', 342, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2724', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (369, '项目部', 342, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2725', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (370, '超声科', 342, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2726', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (371, '上海全景精准医疗有限公司', 1, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '28', '法人单位', NULL, NULL, '启用', NULL, '是', NULL);
INSERT INTO `uvclinic_organization` VALUES (372, '院办', 371, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2801', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (373, '综合办', 371, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2802', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (374, '财务部', 371, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '2803', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (375, '徐州医学影像诊断中心有限公司', 1, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '30', '法人单位', NULL, NULL, '启用', NULL, '是', NULL);
INSERT INTO `uvclinic_organization` VALUES (376, '院办', 375, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '3001', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (377, '综合办', 375, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '3002', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (378, '财务部', 375, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '3003', NULL, NULL, NULL, '启用', NULL, NULL, NULL);
INSERT INTO `uvclinic_organization` VALUES (379, '核医学部', 375, '2021-03-03 12:35:59', '2021-03-03 12:35:59', NULL, NULL, 2, '3026', NULL, NULL, NULL, '启用', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for uvclinic_permission
-- ----------------------------
DROP TABLE IF EXISTS `uvclinic_permission`;
CREATE TABLE `uvclinic_permission`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NULL DEFAULT NULL COMMENT '角色id',
  `menu_id` int(11) NULL DEFAULT NULL COMMENT '菜单id',
  `create_time` datetime(0) NULL DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime(0) NULL DEFAULT NULL COMMENT '更新时间',
  `delete_time` datetime(0) NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 150 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '权限表' ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of uvclinic_permission
-- ----------------------------
INSERT INTO `uvclinic_permission` VALUES (14, 1, 6, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (13, 1, 43, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (12, 1, 42, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (11, 1, 41, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (10, 1, 5, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (9, 1, 7, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (8, 1, 1, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (15, 1, 44, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (16, 1, 45, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (17, 1, 46, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (18, 1, 50, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (19, 1, 4, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (20, 1, 47, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (21, 1, 48, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (22, 1, 49, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (135, 1, 98, '2021-03-05 10:11:36', '2021-03-05 10:11:36', NULL);
INSERT INTO `uvclinic_permission` VALUES (24, 1, 2, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (25, 1, 9, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (26, 1, 10, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (27, 1, 11, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (28, 1, 3, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (29, 1, 12, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (30, 1, 13, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (31, 1, 54, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (32, 1, 55, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (33, 1, 56, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (34, 1, 67, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (35, 1, 68, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (36, 1, 69, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (37, 1, 70, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (38, 1, 57, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (39, 1, 58, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (40, 1, 59, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (41, 1, 71, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (42, 1, 72, '2021-02-23 12:37:23', '2021-02-23 12:37:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (72, 1, 76, '2021-02-23 14:10:21', '2021-02-23 14:10:21', NULL);
INSERT INTO `uvclinic_permission` VALUES (117, 11, 68, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (116, 11, 67, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (115, 11, 56, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (114, 11, 55, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (113, 11, 54, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (112, 11, 94, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (111, 11, 93, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (110, 11, 80, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (109, 11, 79, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (108, 11, 78, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (107, 11, 77, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (106, 11, 1, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (56, 10, 1, '2021-02-23 13:50:46', '2021-02-23 13:50:46', NULL);
INSERT INTO `uvclinic_permission` VALUES (57, 10, 7, '2021-02-23 13:50:46', '2021-02-23 13:50:46', NULL);
INSERT INTO `uvclinic_permission` VALUES (58, 10, 5, '2021-02-23 13:50:46', '2021-02-23 13:50:46', NULL);
INSERT INTO `uvclinic_permission` VALUES (59, 10, 41, '2021-02-23 13:50:46', '2021-02-23 13:50:46', NULL);
INSERT INTO `uvclinic_permission` VALUES (60, 10, 42, '2021-02-23 13:50:46', '2021-02-23 13:50:46', NULL);
INSERT INTO `uvclinic_permission` VALUES (61, 10, 43, '2021-02-23 13:50:46', '2021-02-23 13:50:46', NULL);
INSERT INTO `uvclinic_permission` VALUES (62, 10, 6, '2021-02-23 13:50:46', '2021-02-23 13:50:46', NULL);
INSERT INTO `uvclinic_permission` VALUES (63, 10, 44, '2021-02-23 13:50:46', '2021-02-23 13:50:46', NULL);
INSERT INTO `uvclinic_permission` VALUES (64, 10, 45, '2021-02-23 13:50:46', '2021-02-23 13:50:46', NULL);
INSERT INTO `uvclinic_permission` VALUES (65, 10, 46, '2021-02-23 13:50:46', '2021-02-23 13:50:46', NULL);
INSERT INTO `uvclinic_permission` VALUES (66, 10, 50, '2021-02-23 13:50:46', '2021-02-23 13:50:46', NULL);
INSERT INTO `uvclinic_permission` VALUES (67, 10, 4, '2021-02-23 13:50:46', '2021-02-23 13:50:46', NULL);
INSERT INTO `uvclinic_permission` VALUES (68, 10, 47, '2021-02-23 13:50:46', '2021-02-23 13:50:46', NULL);
INSERT INTO `uvclinic_permission` VALUES (69, 10, 48, '2021-02-23 13:50:46', '2021-02-23 13:50:46', NULL);
INSERT INTO `uvclinic_permission` VALUES (70, 10, 49, '2021-02-23 13:50:46', '2021-02-23 13:50:46', NULL);
INSERT INTO `uvclinic_permission` VALUES (71, 10, 8, '2021-02-23 13:50:46', '2021-02-23 13:50:46', NULL);
INSERT INTO `uvclinic_permission` VALUES (73, 1, 76, '2021-02-23 14:10:49', '2021-02-23 14:10:49', NULL);
INSERT INTO `uvclinic_permission` VALUES (74, 1, 77, '2021-02-23 15:50:47', '2021-02-23 15:50:47', NULL);
INSERT INTO `uvclinic_permission` VALUES (75, 1, 78, '2021-02-23 16:00:17', '2021-02-23 16:00:17', NULL);
INSERT INTO `uvclinic_permission` VALUES (76, 1, 79, '2021-02-23 16:00:44', '2021-02-23 16:00:44', NULL);
INSERT INTO `uvclinic_permission` VALUES (77, 1, 80, '2021-02-23 16:01:19', '2021-02-23 16:01:19', NULL);
INSERT INTO `uvclinic_permission` VALUES (78, 1, 81, '2021-02-23 16:29:32', '2021-02-23 16:29:32', NULL);
INSERT INTO `uvclinic_permission` VALUES (79, 1, 82, '2021-02-23 16:30:21', '2021-02-23 16:30:21', NULL);
INSERT INTO `uvclinic_permission` VALUES (120, 11, 57, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (121, 11, 58, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (119, 11, 70, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (85, 1, 86, '2021-02-23 16:37:20', '2021-02-23 16:37:20', NULL);
INSERT INTO `uvclinic_permission` VALUES (118, 11, 69, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (87, 1, 88, '2021-02-24 09:22:51', '2021-02-24 09:22:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (88, 1, 89, '2021-02-24 09:23:59', '2021-02-24 09:23:59', NULL);
INSERT INTO `uvclinic_permission` VALUES (89, 1, 90, '2021-02-24 09:27:09', '2021-02-24 09:27:09', NULL);
INSERT INTO `uvclinic_permission` VALUES (90, 1, 91, '2021-02-24 09:27:51', '2021-02-24 09:27:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (92, 12, 81, '2021-02-26 09:08:57', '2021-02-26 09:08:57', NULL);
INSERT INTO `uvclinic_permission` VALUES (93, 12, 82, '2021-02-26 09:08:57', '2021-02-26 09:08:57', NULL);
INSERT INTO `uvclinic_permission` VALUES (94, 12, 83, '2021-02-26 09:08:57', '2021-02-26 09:08:57', NULL);
INSERT INTO `uvclinic_permission` VALUES (95, 12, 84, '2021-02-26 09:08:57', '2021-02-26 09:08:57', NULL);
INSERT INTO `uvclinic_permission` VALUES (96, 12, 85, '2021-02-26 09:08:57', '2021-02-26 09:08:57', NULL);
INSERT INTO `uvclinic_permission` VALUES (97, 12, 86, '2021-02-26 09:08:57', '2021-02-26 09:08:57', NULL);
INSERT INTO `uvclinic_permission` VALUES (98, 12, 87, '2021-02-26 09:08:57', '2021-02-26 09:08:57', NULL);
INSERT INTO `uvclinic_permission` VALUES (99, 12, 88, '2021-02-26 09:08:57', '2021-02-26 09:08:57', NULL);
INSERT INTO `uvclinic_permission` VALUES (100, 12, 89, '2021-02-26 09:08:57', '2021-02-26 09:08:57', NULL);
INSERT INTO `uvclinic_permission` VALUES (101, 12, 90, '2021-02-26 09:08:57', '2021-02-26 09:08:57', NULL);
INSERT INTO `uvclinic_permission` VALUES (102, 12, 91, '2021-02-26 09:08:57', '2021-02-26 09:08:57', NULL);
INSERT INTO `uvclinic_permission` VALUES (103, 1, 93, '2021-03-01 14:43:45', '2021-03-01 14:43:45', NULL);
INSERT INTO `uvclinic_permission` VALUES (104, 1, 94, '2021-03-01 15:41:53', '2021-03-01 15:41:53', NULL);
INSERT INTO `uvclinic_permission` VALUES (105, 1, 95, '2021-03-03 10:58:01', '2021-03-03 10:58:01', NULL);
INSERT INTO `uvclinic_permission` VALUES (122, 11, 59, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (123, 11, 71, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (124, 11, 72, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (125, 11, 81, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (126, 11, 82, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (127, 11, 86, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (128, 11, 95, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (129, 11, 88, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (130, 11, 89, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (131, 11, 90, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (132, 11, 91, '2021-03-03 12:35:51', '2021-03-03 12:35:51', NULL);
INSERT INTO `uvclinic_permission` VALUES (133, 1, 96, '2021-03-04 14:13:24', '2021-03-04 14:13:24', NULL);
INSERT INTO `uvclinic_permission` VALUES (134, 1, 97, '2021-03-05 10:09:56', '2021-03-05 10:09:56', NULL);
INSERT INTO `uvclinic_permission` VALUES (136, 1, 99, '2021-03-05 10:32:46', '2021-03-05 10:32:46', NULL);
INSERT INTO `uvclinic_permission` VALUES (137, 1, 100, '2021-03-05 10:33:05', '2021-03-05 10:33:05', NULL);
INSERT INTO `uvclinic_permission` VALUES (138, 1, 101, '2021-03-05 10:33:33', '2021-03-05 10:33:33', NULL);
INSERT INTO `uvclinic_permission` VALUES (139, 1, 102, '2021-03-08 15:35:22', '2021-03-08 15:35:22', NULL);
INSERT INTO `uvclinic_permission` VALUES (140, 1, 103, '2021-03-08 16:20:07', '2021-03-08 16:20:07', NULL);
INSERT INTO `uvclinic_permission` VALUES (141, 1, 104, '2021-03-15 12:07:54', '2021-03-15 12:07:54', NULL);
INSERT INTO `uvclinic_permission` VALUES (142, 1, 105, '2021-03-15 12:08:16', '2021-03-15 12:08:16', NULL);
INSERT INTO `uvclinic_permission` VALUES (143, 1, 106, '2021-03-15 12:08:41', '2021-03-15 12:08:41', NULL);
INSERT INTO `uvclinic_permission` VALUES (144, 1, 107, '2021-03-15 12:09:15', '2021-03-15 12:09:15', NULL);
INSERT INTO `uvclinic_permission` VALUES (145, 1, 108, '2021-03-15 12:09:38', '2021-03-15 12:09:38', NULL);
INSERT INTO `uvclinic_permission` VALUES (146, 1, 109, '2021-03-15 15:07:30', '2021-03-15 15:07:30', NULL);
INSERT INTO `uvclinic_permission` VALUES (147, 1, 110, '2021-03-15 15:10:23', '2021-03-15 15:10:23', NULL);
INSERT INTO `uvclinic_permission` VALUES (148, 1, 111, '2021-03-15 15:10:44', '2021-03-15 15:10:44', NULL);
INSERT INTO `uvclinic_permission` VALUES (149, 1, 112, '2021-03-15 15:11:18', '2021-03-15 15:11:18', NULL);

-- ----------------------------
-- Table structure for uvclinic_persion_assessment
-- ----------------------------
DROP TABLE IF EXISTS `uvclinic_persion_assessment`;
CREATE TABLE `uvclinic_persion_assessment`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NULL DEFAULT NULL COMMENT '员工id',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '员工考核类型',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '员工考核描述',
  `author` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `create_date` datetime(0) NULL DEFAULT NULL,
  `update_date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for uvclinic_persion_assessment_type
-- ----------------------------
DROP TABLE IF EXISTS `uvclinic_persion_assessment_type`;
CREATE TABLE `uvclinic_persion_assessment_type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NULL DEFAULT NULL COMMENT '员工id',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '员工考核类型',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '员工考核描述',
  `author` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `create_date` datetime(0) NULL DEFAULT NULL,
  `update_date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for uvclinic_personnel
-- ----------------------------
DROP TABLE IF EXISTS `uvclinic_personnel`;
CREATE TABLE `uvclinic_personnel`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '工号',
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '姓名',
  `pingyin` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '拼音',
  `en_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '英文名',
  `is_foreign` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '是否为外籍',
  `IDcard` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '身份证号',
  `sex` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '性别',
  `birth` datetime(0) NULL DEFAULT NULL COMMENT '出生日期',
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '邮箱',
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '手机',
  `personal_to_company_id` int(11) NULL DEFAULT NULL COMMENT '公司',
  `department` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '部门',
  `position` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '职位',
  `part_time_job` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '兼职',
  `ptj_class` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '兼职部门',
  `report_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '汇报人',
  `repty_date` datetime(0) NULL DEFAULT NULL COMMENT '入职日期',
  `staff_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '员工类型',
  `staff_status` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '员工状态',
  `is_probation` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '是否在试用期',
  `is_directory_display` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '是否在通讯录中显示',
  `probation_start_date` datetime(0) NULL DEFAULT NULL COMMENT '试用期开始日期',
  `probation_end_date` datetime(0) NULL DEFAULT NULL COMMENT '试用期结束日期',
  `probation_term` int(11) NULL DEFAULT NULL COMMENT '试用期期限（月）',
  `attendance_rules` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '考勤规则',
  `probation_rules` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '试用期规则',
  `age` int(11) NULL DEFAULT NULL COMMENT '年龄',
  `leave_quota_rules` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '休假额度规则',
  `vacation_use_rules` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '休假使用规则',
  `work_overtime_rules` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '加班规则',
  `driver_age` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '司龄(月)',
  `repty_first_age` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '入职前工龄(月)',
  `now_age` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '当前工龄(月)',
  `is_hc_control` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '是否占编',
  `leave_entitlement_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '休假起始类型',
  `shift_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '班次类型',
  `cn_fxqy` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '发薪区域',
  `cn_zply` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '招聘来源',
  `cn_zgxl` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '最高学历',
  `cn_zgxl_2` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '最高学历2',
  `cn_xw` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '学位',
  `cn_byyx` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '毕业院校',
  `cn_sxzy` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '所学专业',
  `cn_zzmm` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '政治面貌',
  `cn_hy` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '婚姻',
  `cn_hj` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '户籍',
  `cn_sfzdz` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '身份证详细地址',
  `cn_xjzddz` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '现居住详细住址',
  `cn_gjjzh` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '公积金账号',
  `cn_khh` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '开户行',
  `cn_zzkh` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '工资卡号',
  `cn_jjlxr` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '紧急联系人',
  `cn_jjlxrdh` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '紧急联系人电话',
  `cn_zj` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '职级',
  `cn_is_fsry` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '是否是放射人员',
  `cn_is_pzj` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '是否有派驻假',
  `cn_is_bt` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '是否有补贴',
  `cn_is_glgz` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '是否有工龄工资',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `code,name`(`code`, `name`, `department`) USING BTREE,
  INDEX `position`(`position`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for uvclinic_personnel_to_company
-- ----------------------------
DROP TABLE IF EXISTS `uvclinic_personnel_to_company`;
CREATE TABLE `uvclinic_personnel_to_company`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sort` int(11) NULL DEFAULT 0,
  `create_time` datetime(0) NULL DEFAULT NULL,
  `update_time` datetime(0) NULL DEFAULT NULL,
  `delete_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of uvclinic_personnel_to_company
-- ----------------------------
INSERT INTO `uvclinic_personnel_to_company` VALUES (1, '全景集团总部', 2, '启用', 1, '2021-03-15 15:29:25', '2021-03-15 15:34:20', NULL);
INSERT INTO `uvclinic_personnel_to_company` VALUES (2, '上海徐汇门诊部', 2, '启用', 2, '2021-03-15 15:29:54', '2021-03-15 15:34:25', NULL);
INSERT INTO `uvclinic_personnel_to_company` VALUES (3, '上海徐汇影像中心', 2, '启用', 3, '2021-03-15 15:34:42', '2021-03-15 15:34:42', NULL);
INSERT INTO `uvclinic_personnel_to_company` VALUES (4, '杭州门诊部', 2, '启用', 4, '2021-03-15 15:34:53', '2021-03-15 15:35:48', NULL);
INSERT INTO `uvclinic_personnel_to_company` VALUES (5, '杭州影像中心', 2, '启用', 5, '2021-03-15 15:36:02', '2021-03-15 15:36:02', NULL);
INSERT INTO `uvclinic_personnel_to_company` VALUES (6, '广州门诊部', 2, '启用', 6, '2021-03-15 15:36:15', '2021-03-15 15:36:22', NULL);
INSERT INTO `uvclinic_personnel_to_company` VALUES (7, '广州影像中心', 2, '启用', 7, '2021-03-15 15:36:32', '2021-03-15 15:36:32', NULL);
INSERT INTO `uvclinic_personnel_to_company` VALUES (8, '成都门诊部', 2, '启用', 8, '2021-03-15 15:36:43', '2021-03-15 15:36:43', NULL);
INSERT INTO `uvclinic_personnel_to_company` VALUES (9, '成都影像中心', 2, '启用', 9, '2021-03-15 15:37:23', '2021-03-15 15:37:23', NULL);
INSERT INTO `uvclinic_personnel_to_company` VALUES (10, '重庆门诊部', 2, '启用', 10, '2021-03-15 15:37:23', '2021-03-15 15:37:23', NULL);
INSERT INTO `uvclinic_personnel_to_company` VALUES (11, '重庆影像中心', 2, '启用', 11, '2021-03-15 15:37:23', '2021-03-15 15:37:23', NULL);
INSERT INTO `uvclinic_personnel_to_company` VALUES (12, '天津门诊部', 2, '启用', 12, '2021-03-15 15:37:23', '2021-03-15 15:37:23', NULL);
INSERT INTO `uvclinic_personnel_to_company` VALUES (13, '天津影像中心', 2, '启用', 13, '2021-03-15 15:37:23', '2021-03-15 15:37:23', NULL);
INSERT INTO `uvclinic_personnel_to_company` VALUES (14, '北京门诊部', 2, '启用', 14, '2021-03-15 15:37:23', '2021-03-15 15:37:23', NULL);
INSERT INTO `uvclinic_personnel_to_company` VALUES (15, '北京影像中心', 2, '启用', 15, '2021-03-15 15:37:23', '2021-03-15 15:37:23', NULL);
INSERT INTO `uvclinic_personnel_to_company` VALUES (16, '上海虹口影像中心', 2, '启用', 16, '2021-03-15 15:37:23', '2021-03-15 15:37:23', NULL);
INSERT INTO `uvclinic_personnel_to_company` VALUES (17, '成都全景德康医学影像诊断中心有限公司', 2, '启用', 17, '2021-03-15 15:37:23', '2021-03-15 15:37:23', NULL);
INSERT INTO `uvclinic_personnel_to_company` VALUES (18, '徐州影像中心', 2, '启用', 18, '2021-03-15 15:37:23', '2021-03-15 15:37:23', NULL);

-- ----------------------------
-- Table structure for uvclinic_position
-- ----------------------------
DROP TABLE IF EXISTS `uvclinic_position`;
CREATE TABLE `uvclinic_position`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '职位编码',
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '职位名称',
  `organization_code` int(11) NULL DEFAULT NULL COMMENT '组织编码',
  `parent_id` int(11) NULL DEFAULT NULL COMMENT '上级职位',
  `is_executive_position` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '是否主管职位（是 /  否）',
  `functional` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '职能',
  `functional_level` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '职能等级',
  `status` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '职位状态（启用 / 关闭）',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '职位说明',
  `create_time` datetime(0) NULL DEFAULT NULL,
  `update_time` datetime(0) NULL DEFAULT NULL,
  `delete_time` datetime(0) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 678 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '职位信息' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of uvclinic_position
-- ----------------------------
INSERT INTO `uvclinic_position` VALUES (1, '1001', '董事长', 1001, 0, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (2, '100101', '董事长', 1001, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (3, '100102', '董事', 1001, 100101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (4, '100103', '董事会秘书', 1001, 100101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (5, '100104', '证券事务代表', 1001, 100103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (6, '100105', '信息披露专员', 1001, 100103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (7, '100106', '投资者关系专员', 1001, 100103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (8, '100107', '政府及投资者关系主管', 1001, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (9, '100201', '总裁', 1002, 100101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (10, '100202', '常务副总裁', 1002, 100201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (11, '100203', '副总裁', 1002, 100201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (12, '100204', '总裁助理', 1002, 100201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (13, '100205', '总裁办主任', 1002, 100201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (14, '100206', '总裁办副主任', 1002, 100205, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (15, '100207', '总裁办专员', 1002, 100205, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (16, '100301', '人力行政总监', 1003, 100203, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (17, '100302', '人力行政副总监', 1003, 100301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (18, '100303', '人事行政经理', 1003, 100301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (19, '100304', '人事专员', 1003, 100301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (20, '100305', '行政专员', 1003, 100301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (21, '100306', '前台接待', 1003, 100301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (22, '100307', '驾驶员', 1003, 100301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (23, '100308', '人力资源经理', 1003, 100301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (24, '100401', '市场营销总监', 1004, 100201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (25, '100402', '市场营销副总监', 1004, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (26, '100403', '市场营销经理', 1004, 100402, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (27, '100404', '企划专员', 1004, 100402, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (28, '100405', '文案编辑', 1004, 100402, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (29, '100406', '平面设计师', 1004, 100402, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (30, '100407', '储备市场销售总监', 1004, 100401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (31, '100501', '财务总监', 1005, 100201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (32, '100502', ' 财务副总监', 1005, 100501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (33, '100503', '财务经理', 1005, 100501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (34, '100504', '总账会计', 1005, 100501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (35, '100505', '财务会计', 1005, 100501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (36, '100506', '出纳会计', 1005, 100501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (37, '100507', '财务助理', 1005, 100501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (38, '100508', '财务分析', 1005, 100502, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (39, '100509', '顾问', 1005, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (40, '100601', '项目投资总监', 1006, 0, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (41, '100602', '项目投资副总监', 1006, 100601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (42, '100603', '项目内勤经理', 1006, 100601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (43, '100604', '项目内勤主管', 1006, 100601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (44, '100605', '采购经理', 1006, 100601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (45, '100606', '采购主管', 1006, 100601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (46, '100607', '采购专员', 1006, 100601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (47, '100608', '工程项目经理', 1006, 100601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (48, '100609', '工程项目主管', 1006, 100601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (49, '100610', '工程项目专员', 1006, 100601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (50, '100611', '项目设计师', 1006, 100601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (51, '100612', '项目开发', 1006, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (52, '100613', '储备总经理', 1006, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (53, '100701', '信息总监', 1007, 100202, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (54, '100702', '信息副总监', 1007, 100701, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (55, '100703', '信息经理', 1007, 100701, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (56, '100704', '信息主管', 1007, 100701, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (57, '100705', '信息专员', 1007, 100701, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (58, '100801', '医疗运营总监', 1008, 100203, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (59, '100802', '医疗运营副总监', 1008, 100801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (60, '100803', '医疗运营经理', 1008, 100801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (61, '100804', '设备经理', 1008, 100801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (62, '100805', '设备专员', 1008, 100801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (63, '100806', '客服经理', 1008, 100801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (64, '100807', '客服专员', 1008, 100801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (65, '100901', '科教总监', 1009, 100202, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (66, '100902', '科教副总监', 1009, 100501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (67, '100903', '科教助理', 1009, 100504, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (68, '101001', '战略创新总监', 1006, 100201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (69, '101002', '战略顾问', 1006, 101001, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (70, '101101', '法务总监', 1001, 100202, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (71, '101102', '法务副总监', 1001, 101101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (72, '101103', '法务经理', 1001, 101101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (73, '101104', '法务主管', 1001, 101101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (74, '101105', '法务专员', 1001, 101101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (75, '101201', '审计总监', 1012, 100101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (76, '101202', '审计副总监', 1012, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (77, '101203', '审计经理', 1012, 101202, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (78, '101204', '审计主管', 1012, 101202, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (79, '101205', '审计专员', 1012, 101202, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (80, '110101', '总顾问', 1101, 110103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (81, '110102', '名誉院长', 1101, 100101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (82, '110103', '执行院长', 1101, 100101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (83, '110104', '总经理', 1101, 100101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (84, '110105', '顾问', 1101, 110103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (85, '110199', '其他', 1117, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (86, '110201', '人事主管', 1102, 110104, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (87, '110203', 'IT维运经理', 1102, 110201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (88, '110204', 'IT维运工程师', 1102, 110201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (89, '110205', '网站维护工程师', 1102, 110201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (90, '110206', '行政专员', 1102, 110201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (91, '110207', '仓库管理员', 1102, 110201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (92, '110208', '保洁员', 1102, 110201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (93, '110209', '保安', 1102, 110201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (94, '110210', '后勤保障人员', 1102, 110201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (95, '110211', '餐厅后勤人员', 1102, 110201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (96, '110212', '驾驶员', 1102, 110201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (97, '110301', '财务经理', 1103, 110104, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (98, '110302', '总账会计', 1103, 110104, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (99, '110303', '财务会计', 1103, 110104, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (100, '110304', '收费员', 1103, 110104, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (101, '110401', '客服翻译', 1104, 120401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (102, '110402', '客服专员', 1104, 120401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (103, '110501', '市场销售副总监', 1105, 110104, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (104, '110502', '大客户部经理', 1125, 110501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (105, '110504', '销售经理', 1125, 110501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (106, '110505', '销售培训讲师', 1125, 110501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (107, '110506', '销售', 1125, 110501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (108, '110507', '销售内勤', 1125, 110501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (109, '110508', '市场销售总监（上海区域）', 1125, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (110, '110601', '市场营销副总监', 1106, 100401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (111, '110602', '文案编辑员', 1106, 110601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (112, '110603', '  市场助理   ', 1106, 110601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (113, '110604', '高级设计师', 1106, 110601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (114, '110605', '市场专员', 1106, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (115, '110606', '设计师', 1106, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (116, '110701', '线上营销专员', 1107, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (117, '110702', '电商主管', 1107, 0, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (118, '110703', '电商运营专员', 1107, 110702, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (119, '110808', '渠道经理', 1108, 0, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (120, '110905', '顾问', 1119, 111901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (121, '111001', '科研助理', 1110, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (122, '111101', '医务部主任', 1111, 110103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (123, '111102', '医务部副主任', 1111, 111101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (124, '111103', '护士长', 1111, 111101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (125, '111104', '技师长', 1111, 111101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (126, '111105', '问诊医师', 1111, 112001, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (127, '111106', '医务主管', 1111, 111101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (128, '111107', '药师', 1111, 111101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (129, '111201', '问诊医生', 1112, 111901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (130, '111301', '解读报告医师', 1113, 111901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (131, '111401', '病案管理负责人', 1114, 110103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (132, '111402', '病案管理员', 1114, 111401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (133, '111600', '护士长', 1116, 110103, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (134, '111601', '护士', 1116, 111600, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (135, '111701', '成都中心销售代表总监', 1117, 100202, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (136, '111708', '项目经理', 1117, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (137, '111801', '技师', 1118, 111104, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (138, '111901', 'PET-CT科室主任', 1119, 110103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (139, '111902', '影像诊断医师', 1119, 111901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (140, '111903', '护士', 1119, 111901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (141, '111904', '技师', 1119, 111901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (142, '112001', 'PET-MR科室主任', 1120, 110103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (143, '112002', '影像诊断医师', 1120, 112001, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (144, '112003', '护士', 1120, 112001, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (145, '112004', '技师', 1120, 112001, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (146, '112101', 'CT科室主任', 1121, 110103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (147, '112102', '影像诊断医师', 1121, 112101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (148, '112103', '技师', 1121, 112101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (149, '112201', '护士', 1122, 112101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (150, '112202', '顾问', 1122, 112101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (151, '112301', '影像诊断医师', 1123, 112401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (152, '112302', '护士', 1123, 112401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (153, '112401', 'MR科室主任', 1124, 110103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (154, '112402', '影像诊断医师', 1124, 112401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (155, '112403', '护士', 1124, 112401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (156, '112404', '技师', 1124, 112401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (157, '112405', '神经学组负责人', 1124, 112401, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (158, '120201', '驾驶员', 1202, 110201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (159, '120301', '出纳', 1203, 110301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (160, '120302', '收费员', 1203, 120301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (161, '120401', '客服部总监', 1104, 110104, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (162, '120402', '客服专员', 1204, 120401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (163, '120501', '销售经理', 1205, 110501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (164, '120502', '销售', 1205, 110501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (165, '120503', '销售内勤', 1205, 110501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (166, '120601', '平面设计师', 1206, 110601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (167, '120801', 'DR医师', 1208, 122801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (168, '120802', '钼靶医师', 1208, 122801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (169, '121101', '检验主管', 1211, 122801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (170, '121501', '超声医师', 1215, 122801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (171, '121502', '护士', 1215, 122501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (172, '121503', '心电图医生', 1215, 122801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (173, '121601', '总检医师', 1216, 122801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (174, '121602', '内科医师', 1216, 122801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (175, '121603', '报告解读医师', 1216, 122801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (176, '121701', '外科医生', 1217, 122801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (177, '121801', '妇科医师', 1218, 122801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (178, '121901', '眼科医生', 1219, 122801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (179, '122001', '耳鼻喉科医师', 1220, 122801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (180, '122301', '护士', 1223, 122501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (181, '122401', '护士', 1224, 122501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (182, '122501', '护士长', 1225, 122801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (183, '122502', '护士', 1225, 122501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (184, '122601', '病案管理员', 1226, 111401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (185, '122602', '护士', 1226, 122501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (186, '122801', '体检中心主任', 1228, 110103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (187, '130101', '总经理/院长', 1301, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (188, '130102', '副总经理', 1301, 130101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (189, '130200', '综合办主任', 1302, 0, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (190, '130201', '行政专员', 1302, 130102, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (191, '130202', '人事专员', 1302, 130102, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (192, '130203', '采购专员', 1302, 130102, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (193, '130204', '水电工', 1302, 130102, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (194, '130205', '司机', 1302, 130102, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (195, '130206', '信息管理员', 1302, 130102, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (196, '130207', '弱电工', 1302, 130102, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (197, '130208', '库管员', 1302, 130102, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (198, '130209', '门卫', 1302, 130102, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (199, '130301', '财务部经理', 1303, 130101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (200, '130302', '副经理', 1303, 130101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (201, '130303', '会计', 1303, 130301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (202, '130304', '总账会计', 1303, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (203, '130305', '会计助理', 1303, 130301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (204, '130306', '收银员', 1303, 130301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (205, '130401', '客服主管', 1304, 130101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (206, '130402', '客服', 1304, 130401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (207, '130601', '市场主管', 1306, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (208, '130602', '策划执行专员', 1306, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (209, '130603', '广告企划专员', 1306, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (210, '130701', '电商客服专员', 1307, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (211, '130901', '广宇董事', 1309, 130101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (212, '130902', '销售组长', 1309, 130101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (213, '130903', '销售内勤', 1309, 130101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (214, '131601', '护理组长', 1316, 131901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (215, '131602', '护士', 1316, 131601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (216, '131603', '前台导服', 1316, 131601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (217, '131604', '餐吧服务员', 1316, 131601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (218, '131801', '技师组长', 1318, 131901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (219, '131802', '技师', 1318, 131801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (220, '131901', '科室主任', 1319, 130101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (221, '131902', '影像诊断医师', 1319, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (222, '132001', '影像诊断医师', 1320, 131901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (223, '132101', '影像诊断医师', 1321, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (224, '132201', '影像诊断医师', 1322, 131901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (225, '132401', '影像诊断医师', 1324, 131901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (226, '132501', '图形图像处理算法工程师', 1325, 130101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (227, '132502', 'MR序列研发工程师', 1325, 130101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (228, '132601', '超声医师', 1324, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (229, '132701', '餐吧服务员', 1327, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (230, '150047', '消化内镜主任', 1529, 130102, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (231, '150101', '首席顾问', 1501, 130101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (232, '150801', '销售内勤', 1508, 130102, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (233, '150802', '销售组长', 1508, 130102, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (234, '150803', '销售', 1508, 130102, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (235, '151301', '检验技师', 1513, 130102, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (236, '151302', '检验技士', 1513, 130102, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (237, '151801', '内科医师', 1518, 152901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (238, '151901', '外科医师', 1519, 152901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (239, '151902', '耳鼻喉医师', 1522, 152901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (240, '151903', '口腔医师', 1523, 152901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (241, '151904', '妇科医师', 1520, 152901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (242, '152701', '总护士长', 1527, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (243, '152702', '护理组长', 1527, 152901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (244, '152703', '护士', 1527, 152901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (245, '152704', '前台', 1527, 152901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (246, '152705', '餐吧服务员', 1527, 152901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (247, '152901', '体检中心主任', 1501, 130102, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (248, '152902', '麻醉医师', 1529, 152901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (249, '152903', '护士', 1529, 152901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (250, '153001', '口腔医师', 1530, 130102, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (251, '153002', '护士', 1530, 130102, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (252, '153101', '护士', 1531, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (253, '153102', '报告员主管', 1531, 130102, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (254, '153103', '报告员', 1531, 153102, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (255, '153104', '超声医师', 1531, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (256, '153105', '超声医师', 1326, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (257, '153201', '主管药师', 1532, 130102, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (258, '153202', '药剂士', 1532, 130102, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (259, '153301', '医保专员', 1533, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (260, '153401', '餐吧服务员', 1534, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (261, '160101', '院长', 1601, 100101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (262, '160102', '总经理', 1601, 100101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (263, '160103', '副院长', 1601, 160101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (264, '160104', '副院长', 1601, 160101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (265, '160105', '院长助理', 1601, 160101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (266, '160106', '总经理助理', 1601, 160102, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (267, '160201', '人事主管', 1602, 160206, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (268, '160202', '医管专员', 1602, 161101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (269, '160203', '驾驶员', 1602, 160206, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (270, '160204', '信息主管', 1602, 160206, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (271, '160205', '工程项目经理', 1602, 100602, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (272, '160206', '人事行政经理', 1602, 160102, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (273, '160207', '保洁员', 1602, 160206, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (274, '160208', '医务主管', 1602, 161101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (275, '160209', '行政经理', 1602, 160206, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (276, '160210', '水电工', 1602, 160206, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (277, '160301', '财务经理', 1603, 160102, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (278, '160302', '总账会计', 1603, 160301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (279, '160303', '出纳会计', 1603, 160301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (280, '160304', '收费专员', 1603, 160301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (281, '160401', '客服经理', 1604, 160102, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (282, '160402', '客服主管', 1604, 160401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (283, '160403', '客服专员', 1604, 160401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (284, '160404', '报告专员', 1604, 160401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (285, '160405', '预约专员', 1604, 160401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (286, '160601', '市场营销经理', 1606, 160103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (287, '160602', '媒体公关专员', 1605, 160601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (288, '160603', '平面设计师', 1606, 160601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (289, '160604', '市场专员', 1606, 160601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (290, '160801', '销售总监', 1608, 160103, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (291, '160802', '内勤专员', 1608, 160801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (292, '160803', '销售经理', 1608, 160801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (293, '160901', '销售总监', 1609, 160103, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (294, '161101', '医疗管理经理', 1611, 160104, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (295, '161901', '影像诊断医师', 1619, 161907, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (296, '161902', '问诊医师', 1619, 161907, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (297, '161903', '技师组长', 1619, 161907, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (298, '161904', '技师', 1619, 161903, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (299, '161905', '护士组长', 1619, 161907, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (300, '161906', '护士', 1619, 161905, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (301, '161907', '科室主任', 1619, 160104, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (302, '162001', '影像诊断医师', 1620, 161907, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (303, '162002', '技师', 1620, 161903, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (304, '162003', '护士', 1620, 161905, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (305, '162004', '保洁员', 1620, 161905, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (306, '162101', '技师', 1621, 162302, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (307, '162102', '护士', 1621, 162403, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (308, '162103', '问诊医师', 1621, 162401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (309, '162104', '影像诊断医师', 1621, 162401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (310, '162201', '影像诊断医师', 1622, 162401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (311, '162202', '技师', 1622, 162302, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (312, '162203', '护士', 1622, 162403, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (313, '162301', '影像诊断医师', 1623, 162401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (314, '162302', '技师组长', 1623, 162401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (315, '162303', '技师', 1623, 162302, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (316, '162304', '护士', 1623, 162403, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (317, '162401', '科室主任', 1624, 160104, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (318, '162402', '影像诊断医师', 1624, 162401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (319, '162403', '护士组长', 1624, 162401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (320, '162404', '技师', 1624, 162302, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (321, '162405', '护士', 1624, 162403, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (322, '162406', '问诊医师', 1624, 162401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (323, '162501', '超声医师', 1625, 170101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (324, '162601', '影像诊断医师', 1626, 162401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (325, '162602', '技师', 1626, 162302, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (326, '162603', '护士', 1626, 162403, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (327, '162701', '技师', 1627, 162302, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (328, '162702', '护士', 1627, 162403, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (329, '170101', '体检中心主任', 1701, 160101, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (330, '170201', '人事专员', 1702, 160206, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (331, '170202', '餐服专员', 1702, 160206, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (332, '170301', '会计专员', 1703, 160301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (333, '170302', '收费专员', 1703, 160301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (334, '170401', '客服主管', 1704, 160401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (335, '170402', '客服专员', 1704, 160401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (336, '170501', '销售副总监', 1705, 160801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (337, '170502', '销售副总监', 1705, 160801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (338, '170503', '销售副总监', 1705, 160801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (339, '170504', '销售专员', 1705, 170501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (340, '170505', '销售专员', 1705, 170502, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (341, '170506', '销售专员', 1705, 160801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (342, '170507', '内勤专员', 1705, 160106, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (343, '171001', '总检医师', 1710, 170101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (344, '171401', '心电室医师', 1714, 170101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (345, '171402', '护士', 1714, 171902, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (346, '171601', '内科医师', 1716, 170101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (347, '171602', '护士', 1716, 171902, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (348, '171603', '导诊', 1716, 171902, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (349, '171701', '问诊医师', 1717, 162401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (350, '171702', '外科医师', 1717, 170101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (351, '171703', '护士', 1717, 171902, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (352, '171801', '妇科医师', 1718, 170101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (353, '171802', '护士', 1718, 171902, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (354, '171901', '眼科医师', 1719, 170101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (355, '171902', '护士组长', 1719, 170101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (356, '172001', '耳鼻喉科医师', 1720, 170101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (357, '172002', '护士', 1720, 171902, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (358, '172003', '导诊', 1720, 171902, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (359, '172101', '口腔科医师', 1721, 160401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (360, '172401', '护士', 1724, 171902, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (361, '172701', '执业药师', 1727, 160401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (362, '180101', '院长', 1801, 100101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (363, '180102', '总经理', 1801, 100101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (364, '180201', '综合办主管', 1802, 180101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (365, '180202', '医政管理', 1802, 180101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (366, '180203', '人事专员', 1802, 180201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (367, '180204', '行政专员', 1802, 180201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (368, '180205', '采购专员', 1802, 180201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (369, '180206', '后勤专员', 1802, 180201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (370, '180207', '信息专员', 1802, 180201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (371, '180208', '仓管员', 1802, 180201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (372, '180209', '驾驶员', 1802, 180201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (373, '180301', '财务主管', 1803, 180101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (374, '180302', '总账会计', 1803, 180301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (375, '180303', '财务会计', 1803, 180301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (376, '180304', '出纳会计', 1803, 180301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (377, '180305', '收费员', 1803, 180304, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (378, '180401', '客服主管', 1804, 180101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (379, '180402', '预约专员', 1804, 180401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (380, '180403', '客服专员', 1804, 180401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (381, '180505', '电子商务', 1805, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (382, '180601', '市场营销主管', 1805, 180101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (383, '180602', '电话销售', 1805, 180601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (384, '180801', '渠道主管', 1805, 180101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (385, '180802', '销售内勤', 1805, 180801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (386, '181101', '医管专员', 1811, 180101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (387, '181401', '科室主任', 1814, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (388, '181402', '科室副主任', 1814, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (389, '181403', '影像诊断医师', 1814, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (390, '181501', '护士长', 1815, 181401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (391, '181502', '护士', 1815, 181501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (392, '181503', '发报告', 1815, 181501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (393, '181801', '技师长', 1818, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (394, '181802', '技师', 1818, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (395, '190101', '门诊主任', 1901, 180101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (396, '190201', '仓管员', 1902, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (397, '190301', '收费员', 1903, 180301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (398, '190401', '客服专员', 1904, 180401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (399, '190501', '渠道主管', 1905, 180101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (400, '191501', '超声医师', 1915, 190101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (401, '191502', '超声护士', 1915, 191501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (402, '191503', '超声助理', 1915, 191501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (403, '192501', '护士长', 1925, 190101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (404, '192502', '护士', 1925, 192501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (405, '192601', '主检医师', 1926, 190101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (406, '192602', '初检医师', 1926, 190101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (407, '192603', '内科医师', 1926, 190101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (408, '192604', '外科医师', 1926, 190101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (409, '192605', '妇科医师', 1926, 190101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (410, '192606', '五官科医师', 1926, 190101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (411, '200012', '总经理助理', 2001, 0, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (412, '200100', '院长', 2001, 0, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (413, '200101', '院长', 20, 0, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (414, '200102', '院长助理', 2001, 200101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (415, '200103', '医务专员', 2011, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (416, '200104', '副院长', 2001, 200101, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (417, '200201', '综合办主任', 2002, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (418, '200202', '人事主管', 2002, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (419, '200203', '行政主管', 2002, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (420, '200204', '信息管理员', 2002, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (421, '200205', '驾驶员', 2002, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (422, '200206', '电工', 2002, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (423, '200207', '库管', 2002, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (424, '200301', '财务经理', 2003, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (425, '200302', '会计主管', 2003, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (426, '200303', '出纳会计', 2003, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (427, '200304', '收银员', 2003, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (428, '200401', '客服主管', 2004, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (429, '200402', '客服专员', 2004, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (430, '200501', '销售主管', 2005, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (431, '200502', '销售内勤', 2005, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (432, '200503', '初级业务员', 2005, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (433, '200601', '平面设计', 2006, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (434, '200602', '文案策划', 2006, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (435, '200603', '网络推广专员', 2006, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (436, '201401', '报告医师', 2014, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (437, '201601', '护士长', 2016, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (438, '201602', '护士', 2016, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (439, '201801', '技师组长', 2018, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (440, '201802', '技师', 2018, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (441, '201901', '技师', 2019, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (442, '202001', '技师', 2020, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (443, '202101', '技师', 2021, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (444, '202201', '技师', 2022, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (445, '202301', '技师', 2023, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (446, '202401', '技师', 2024, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (447, '202701', '技师', 2027, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (448, '202801', '技师', 2028, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (449, '210101', '体检中心主任', 21, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (450, '210501', '销售主管', 2105, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (451, '210502', '初级业务员', 2105, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (452, '211001', '总检医师', 2110, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (453, '211501', '超声医师', 2115, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (454, '211601', '内科医师', 2116, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (455, '211801', '妇科医师', 2118, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (456, '212001', '耳鼻喉科医师', 2120, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (457, '212501', '护士长', 2125, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (458, '212502', '护士', 2125, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (459, '220101', '总经理', 2201, 100101, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (460, '220102', '院长', 2201, 1001, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (461, '220103', '副院长', 2201, 220101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (462, '220201', '办公室主任', 2202, 220101, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (463, '220202', '人事主管', 2202, 220201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (464, '220203', '行政专员', 2202, 220201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (465, '220204', '信息主管', 2202, 220201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (466, '220205', '综合维修', 2202, 220201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (467, '220301', '财务经理', 2203, 220101, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (468, '220302', '会计', 2203, 220301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (469, '220303', '出纳', 2203, 220301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (470, '220304', '收银员', 2203, 220301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (471, '220401', '销售总监', 2204, 220101, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (472, '220402', '销售经理', 2204, 220401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (473, '220403', '销售内勤', 2204, 220401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (474, '220405', '市场文案', 2204, 220101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (475, '220501', '客服主任', 2205, 220101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (476, '220502', '客服专员', 2205, 220501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (477, '220601', '医务主任', 2206, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (478, '220602', '医务助理', 2206, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (479, '220701', '护士长', 2207, 220103, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (480, '220702', '护士', 2207, 220701, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (481, '220801', 'PET医疗主任', 2208, 220103, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (482, '220802', '主治医师', 2208, 220801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (483, '220803', '技师', 2208, 220801, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (484, '220901', 'CT/MR医疗主任', 2209, 220103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (485, '220902', 'CT/MR副主任', 2209, 220103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (486, '220903', '主治医师', 2209, 220103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (487, '220904', '技师', 2209, 220103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (488, '221001', '超声医师', 2210, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (489, '221101', '心电图医师', 2211, 220103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (490, '221201', '市场文案', 2212, 220101, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (491, '230201', '内科医师', 2302, 220103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (492, '230301', '内科医师', 2301, 220103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (493, '230302', '外科医师', 2303, 220103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (494, '230401', '妇科医师', 2304, 220103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (495, '230601', '护士长', 2306, 220103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (496, '230602', '护士', 2306, 220701, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (497, '230801', '医务助理', 2308, 220103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (498, '260101', '院长', 2601, 0, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (499, '260201', '综合办主任', 2602, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (500, '260202', '人事主管', 2602, 260201, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (501, '260203', 'IT维运经理', 2602, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (502, '260204', 'IT维运工程师', 2602, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (503, '260205', '网站维护工程师', 2602, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (504, '260206', '行政专员', 2602, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (505, '260207', '仓库管理员', 2602, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (506, '260208', '保洁员', 2602, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (507, '260209', '保安', 2602, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (508, '260211', '餐厅后勤人员', 2602, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (509, '260212', '驾驶员', 2602, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (510, '260213', '设备管理员', 2602, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (511, '260215', '后勤保障人员', 2602, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (512, '260303', '财务会计', 2603, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (513, '260304', '收费员', 2603, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (514, '260305', '出纳', 2603, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (515, '260306', '应收会计', 2603, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (516, '260307', '财务经理', 2603, 0, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (517, '260401', '客服翻译', 2604, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (518, '260402', '客服专员', 2604, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (519, '260501', '市场销售副总监', 2605, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (520, '260502', '大客户部经理', 2605, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (521, '260504', '销售经理', 2605, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (522, '260505', '销售培训讲师', 2605, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (523, '260506', '销售', 2605, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (524, '260507', '销售内勤', 2605, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (525, '260601', '市场营销副总监', 2606, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (526, '260602', '文案编辑员', 2606, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (527, '260603', '  市场助理   ', 2606, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (528, '260604', '高级设计师', 2606, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (529, '260605', '市场专员', 2606, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (530, '260701', '线上营销专员', 2607, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (531, '260808', '渠道经理', 2608, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (532, '260905', '顾问', 2619, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (533, '261001', '科教专员', 2610, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (534, '261201', '问诊医生', 2612, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (535, '261301', '解读报告医师', 2613, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (536, '261401', '病案管理负责人', 2614, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (537, '261402', '病案管理员', 2614, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (538, '261600', '护士长', 2616, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (539, '261601', '护士', 2616, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (540, '261701', '成都中心销售代表总监', 2617, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (541, '261708', '项目经理', 2617, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (542, '261801', '技师', 2618, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (543, '261802', '技师长', 2618, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (544, '261901', 'PET-CT科室主任', 2619, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (545, '261902', '影像诊断医师', 2619, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (546, '261903', '护士', 2619, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (547, '261904', '技师', 2619, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (548, '262001', 'PET-MR科室主任', 2620, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (549, '262002', '影像诊断医师', 2620, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (550, '262003', '护士', 2620, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (551, '262004', '技师', 2620, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (552, '262101', 'CT科室主任', 2621, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (553, '262102', '影像诊断医师', 2621, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (554, '262103', '技师', 2621, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (555, '262201', '护士', 2622, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (556, '262202', '顾问', 2622, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (557, '262301', '影像诊断医师', 2623, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (558, '262302', '护士', 2623, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (559, '262401', 'MR科室主任', 2624, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (560, '262402', '影像诊断医师', 2624, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (561, '262403', '护士', 2624, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (562, '262404', '技师', 2624, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (563, '262601', '医务部主任', 2626, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (564, '262602', '医务部副主任', 2626, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (565, '262603', '护士长', 2626, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (566, '262604', '技师长', 2626, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (567, '262605', '问诊医师', 2626, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (568, '262606', '医务专员', 2626, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (569, '262607', '药师', 2626, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (570, '262701', '超声科主任', 2627, 0, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (571, '270101', '总顾问', 2701, 270103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (572, '270102', '名誉院长', 2701, 270101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (573, '270103', '执行院长', 2701, 0, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (574, '270104', '总经理', 2701, 270101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (575, '270105', '顾问', 2701, 270103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (576, '270106', '副院长', 2701, 270103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (577, '270199', '其他', 2717, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (578, '270200', '人事主管', 2702, 270104, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (579, '270201', '项目筹建经理', 2702, 100602, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (580, '270202', '综合办主任', 2702, 0, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (581, '270203', '工程项目经理', 2702, 100602, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (582, '270204', 'IT维运工程师', 2702, 270200, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (583, '270205', '网站维护工程师', 2702, 270200, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (584, '270206', '行政专员', 2702, 270200, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (585, '270207', '仓库管理员', 2702, 270200, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (586, '270208', '保洁员', 2702, 270200, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (587, '270209', '保安', 2702, 270200, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (588, '270211', '餐厅后勤人员', 2702, 270200, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (589, '270212', '驾驶员', 2702, 270200, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (590, '270213', 'IT维运经理', 2702, 270200, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (591, '270214', 'IT运维主管', 2702, 270202, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (592, '270215', '行政人事专员', 2702, 270202, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (593, '270216', '商务司机', 2702, 270202, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (594, '270217', '医政专员', 2702, 270202, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (595, '270218', '综合办副主任', 2702, 0, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (596, '270219', '水电工', 2702, 270218, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (597, '270220', '行政专员', 2702, 270218, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (598, '270301', '财务经理', 2703, 270104, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (599, '270302', '总账会计', 2703, 270104, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (600, '270303', '财务会计', 2703, 270104, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (601, '270304', '收费员', 2703, 270104, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (602, '270305', '出纳', 2703, 270301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (603, '270306', '会计', 2703, 270301, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (604, '270401', '客服部总监', 2704, 270104, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (605, '270402', '客服专员', 2704, 270401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (606, '270403', '客服翻译', 2704, 270401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (607, '270404', '客服主管', 2704, 270104, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (608, '270501', '市场销售副总监', 2705, 270104, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (609, '270502', '大客户部经理', 2705, 270501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (610, '270503', '总经理助理', 2705, 270104, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (611, '270504', '销售经理', 2705, 270501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (612, '270505', '销售培训讲师', 2705, 270501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (613, '270506', '销售', 2705, 270501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (614, '270507', '销售内勤', 2705, 270501, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (615, '270508', '运营副总监', 2705, 270503, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (616, '270509', '销售内勤主管', 2705, 270103, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (617, '270510', '文案策划', 2705, 270503, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (618, '270601', '市场营销副总监', 2706, 270401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (619, '270602', '文案编辑员', 2706, 270601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (620, '270603', '  市场助理   ', 2706, 270601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (621, '270604', '高级设计师', 2706, 270601, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (622, '270605', '市场专员', 2706, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (623, '270606', '设计师', 2706, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (624, '270701', '线上营销专员', 2707, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (625, '270808', '渠道经理', 2708, 0, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (626, '270905', '顾问', 2719, 271901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (627, '271001', '科教专员', 2710, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (628, '271101', '医务部主任', 2711, 270103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (629, '271102', '医务部副主任', 2711, 271101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (630, '271103', '护士长', 2711, 271101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (631, '271104', '技师长', 2711, 271101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (632, '271105', '问诊医师', 2711, 272001, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (633, '271106', '医务专员', 2711, 271101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (634, '271107', '药师', 2711, 271101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (635, '271201', '问诊医生', 2712, 271901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (636, '271301', '解读报告医师', 2713, 271901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (637, '271401', '病案管理负责人', 2714, 270103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (638, '271402', '病案管理员', 2714, 271401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (639, '271600', '护士长', 2716, 271603, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (640, '271601', '护士', 2716, 271600, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (641, '271602', '护理组长', 2716, 270106, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (642, '271603', '总护士长', 2716, 270106, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (643, '271801', '技师', 2718, 271104, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (644, '271802', '技师组长', 2718, 270106, '是', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (645, '271803', '实习技师', 2718, 271802, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (646, '271901', 'PET-CT科室主任', 2719, 270103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (647, '271902', '影像诊断医师', 2719, 271901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (648, '271903', '护士', 2719, 271901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (649, '271904', '技师', 2719, 271901, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (650, '271906', 'PET/CT副主任', 2719, 270106, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (651, '272001', 'PET-MR科室主任', 2720, 270103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (652, '272002', '影像诊断医师', 2720, 272001, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (653, '272003', '护士', 2720, 272001, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (654, '272004', '技师', 2720, 272001, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (655, '272101', 'CT科室主任', 2721, 270103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (656, '272102', '影像诊断医师', 2721, 272101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (657, '272103', '技师', 2721, 272101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (658, '272201', '护士', 2722, 272101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (659, '272202', '顾问', 2722, 272101, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (660, '272301', '影像诊断医师', 2723, 272401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (661, '272302', '护士', 2723, 272401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (662, '272401', 'MR科室主任', 2724, 270103, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (663, '272402', '影像诊断医师', 2724, 272401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (664, '272403', '护士', 2724, 272401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (665, '272404', '技师', 2724, 272401, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (666, '272501', '项目经理', 2725, 100602, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (667, '272601', '超声医生', 2726, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (668, '280201', '项目筹建', 2802, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (669, '300101', '总经理', 3001, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (670, '300102', '院长', 3001, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (671, '300103', '副院长', 3001, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (672, '300201', '综合办公室主任', 3002, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (673, '300202', '人事主管', 3002, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (674, '300301', '财务经理', 3003, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (675, '300303', '应收应付', 3003, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (676, '302601', '科室主任', 3026, 0, '否', '', '', '启用', NULL, '2021-03-08 16:16:40', '2021-03-08 16:16:40', NULL, 2);
INSERT INTO `uvclinic_position` VALUES (677, '99999', '测试', 3026, 300102, '是', '', '', '启用', '111', '2021-03-08 16:45:55', '2021-03-08 17:11:14', '2021-03-08 17:11:14', 2);

-- ----------------------------
-- Table structure for uvclinic_province
-- ----------------------------
DROP TABLE IF EXISTS `uvclinic_province`;
CREATE TABLE `uvclinic_province`  (
  `id` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '省级城市' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of uvclinic_province
-- ----------------------------
INSERT INTO `uvclinic_province` VALUES ('1', '北京市');
INSERT INTO `uvclinic_province` VALUES ('2', '天津市');
INSERT INTO `uvclinic_province` VALUES ('3', '上海市');
INSERT INTO `uvclinic_province` VALUES ('4', '重庆市');
INSERT INTO `uvclinic_province` VALUES ('5', '河北省');
INSERT INTO `uvclinic_province` VALUES ('6', '山西省');
INSERT INTO `uvclinic_province` VALUES ('7', '台湾省');
INSERT INTO `uvclinic_province` VALUES ('8', '辽宁省');
INSERT INTO `uvclinic_province` VALUES ('9', '吉林省');
INSERT INTO `uvclinic_province` VALUES ('10', '黑龙江省');
INSERT INTO `uvclinic_province` VALUES ('11', '江苏省');
INSERT INTO `uvclinic_province` VALUES ('12', '浙江省');
INSERT INTO `uvclinic_province` VALUES ('13', '安徽省');
INSERT INTO `uvclinic_province` VALUES ('14', '福建省');
INSERT INTO `uvclinic_province` VALUES ('15', '江西省');
INSERT INTO `uvclinic_province` VALUES ('16', '山东省');
INSERT INTO `uvclinic_province` VALUES ('17', '河南省');
INSERT INTO `uvclinic_province` VALUES ('18', '湖北省');
INSERT INTO `uvclinic_province` VALUES ('19', '湖南省');
INSERT INTO `uvclinic_province` VALUES ('20', '广东省');
INSERT INTO `uvclinic_province` VALUES ('21', '甘肃省');
INSERT INTO `uvclinic_province` VALUES ('22', '四川省');
INSERT INTO `uvclinic_province` VALUES ('23', '贵州省');
INSERT INTO `uvclinic_province` VALUES ('24', '海南省');
INSERT INTO `uvclinic_province` VALUES ('25', '云南省');
INSERT INTO `uvclinic_province` VALUES ('26', '青海省');
INSERT INTO `uvclinic_province` VALUES ('27', '陕西省');
INSERT INTO `uvclinic_province` VALUES ('28', '广西壮族自治区');
INSERT INTO `uvclinic_province` VALUES ('29', '西藏自治区');
INSERT INTO `uvclinic_province` VALUES ('30', '宁夏回族自治区');
INSERT INTO `uvclinic_province` VALUES ('31', '新疆维吾尔自治区');
INSERT INTO `uvclinic_province` VALUES ('32', '内蒙古自治区');
INSERT INTO `uvclinic_province` VALUES ('33', '澳门特别行政区');
INSERT INTO `uvclinic_province` VALUES ('34', '香港特别行政区');

-- ----------------------------
-- Table structure for uvclinic_role
-- ----------------------------
DROP TABLE IF EXISTS `uvclinic_role`;
CREATE TABLE `uvclinic_role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `create_time` datetime(0) NULL DEFAULT NULL,
  `update_time` datetime(0) NULL DEFAULT NULL,
  `delete_time` datetime(0) NULL DEFAULT NULL,
  `open` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '开启状态：on 开启，off 关闭',
  `sort` int(255) NULL DEFAULT 0 COMMENT '排序',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '角色表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of uvclinic_role
-- ----------------------------
INSERT INTO `uvclinic_role` VALUES (1, '超级管理员', '超级管理员', '2021-02-05 10:17:44', '2021-02-05 13:49:13', NULL, 'on', 1);
INSERT INTO `uvclinic_role` VALUES (2, '测试', '', '2021-02-05 10:17:52', '2021-03-05 11:23:00', '2021-03-05 11:23:00', 'on', 3);
INSERT INTO `uvclinic_role` VALUES (10, '管理员', '管理员', '2021-02-23 09:23:27', '2021-02-23 09:23:27', NULL, NULL, 2);
INSERT INTO `uvclinic_role` VALUES (6, '12312', '3123123123', '2021-02-05 17:15:42', '2021-02-05 17:15:52', '2021-02-05 17:15:52', 'off', 3);
INSERT INTO `uvclinic_role` VALUES (7, '231', '23123123', '2021-02-05 17:21:37', '2021-02-05 17:21:43', '2021-02-05 17:21:43', 'on', 4);
INSERT INTO `uvclinic_role` VALUES (8, '123', '123', '2021-02-08 11:02:42', '2021-02-08 11:19:49', '2021-02-08 11:19:49', 'off', 12);
INSERT INTO `uvclinic_role` VALUES (9, '123123123', '12312312312', '2021-02-08 11:19:59', '2021-02-08 11:21:25', '2021-02-08 11:21:25', 'off', 123123);
INSERT INTO `uvclinic_role` VALUES (11, '人事管理员', '人事管理员', '2021-02-23 12:38:18', '2021-02-23 12:38:18', NULL, NULL, 3);
INSERT INTO `uvclinic_role` VALUES (12, 'kpi考核员', 'kpi考核员', '2021-02-26 09:08:46', '2021-02-26 09:08:46', NULL, NULL, 5);
INSERT INTO `uvclinic_role` VALUES (13, 'ceshi1', '', '2021-03-05 11:24:48', '2021-03-05 11:25:02', '2021-03-05 11:25:02', NULL, 5);
INSERT INTO `uvclinic_role` VALUES (14, 'ceshi2', '', '2021-03-05 11:24:57', '2021-03-05 11:25:42', '2021-03-05 11:25:42', NULL, 6);
INSERT INTO `uvclinic_role` VALUES (15, 'ceshi3', '', '2021-03-05 11:25:34', '2021-03-05 11:26:34', '2021-03-05 11:26:34', NULL, 7);

-- ----------------------------
-- Table structure for uvclinic_user
-- ----------------------------
DROP TABLE IF EXISTS `uvclinic_user`;
CREATE TABLE `uvclinic_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户名',
  `nickname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '昵称',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '邮箱',
  `sex` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '性别',
  `birth` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '出生日期',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '地址',
  `role_id` int(11) NULL DEFAULT NULL COMMENT '角色id',
  `open` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '状态： on 标识 开启 off 标识 禁用',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '密码',
  `create_time` datetime(0) NULL DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime(0) NULL DEFAULT NULL COMMENT '修改时间',
  `delete_time` datetime(0) NULL DEFAULT NULL COMMENT '删除时间',
  `ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ip',
  `login_time` datetime(0) NULL DEFAULT NULL COMMENT '登录时间',
  `login_num` int(11) NULL DEFAULT 0 COMMENT '登录次数',
  `client_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'apiid',
  `secret` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of uvclinic_user
-- ----------------------------
INSERT INTO `uvclinic_user` VALUES (1, '1', '1', '11@qq.com', '女', NULL, '1', 2, 'off', 'c4ca4238a0b923820dcc509a6f75849b', '2021-02-05 15:59:24', '2021-02-09 09:45:09', '2021-02-09 09:45:09', NULL, NULL, 0, NULL, NULL);
INSERT INTO `uvclinic_user` VALUES (2, 'admin', 'admin', 'admin@admin.com', '男', '1993-01-21', '上海市', 1, 'on', 'c4ca4238a0b923820dcc509a6f75849b', '2021-02-05 16:04:51', '2021-02-09 16:26:35', NULL, '127.0.0.1', '2021-03-15 09:48:08', 19, NULL, NULL);
INSERT INTO `uvclinic_user` VALUES (4, '1', '1', '1@1.com', '男', '2021-02-08', '上海市徐汇区桂林路406号2号楼', 2, 'off', 'c4ca4238a0b923820dcc509a6f75849b', '2021-02-08 11:03:08', '2021-02-09 09:45:04', '2021-02-09 09:45:04', '127.0.0.1', NULL, 0, NULL, NULL);
INSERT INTO `uvclinic_user` VALUES (5, '1234', '1234', '1234@11.com', '女', '2021-02-08', '1234', 2, 'off', '202cb962ac59075b964b07152d234b70', '2021-02-08 11:08:55', '2021-02-08 11:14:18', '2021-02-08 11:14:18', '127.0.0.1', NULL, 0, NULL, NULL);
INSERT INTO `uvclinic_user` VALUES (6, 'ceshi', 'ceshi', 'ceshi@ceshi.com', '男', '2021-02-09', 'ceshi', 2, 'on', 'c4ca4238a0b923820dcc509a6f75849b', '2021-02-09 09:47:10', '2021-02-09 09:47:10', NULL, '127.0.0.1', '2021-02-23 11:40:08', 10, NULL, NULL);
INSERT INTO `uvclinic_user` VALUES (7, 'xiaorun', '肖润', 'xiaorun@uvclinic.cn', '男', '1993-01-21', '上海市徐汇区桂林路406号2号楼', 1, 'on', 'c4ca4238a0b923820dcc509a6f75849b', '2021-02-09 13:03:03', '2021-03-10 12:21:35', NULL, '127.0.0.1', '2021-02-23 14:03:29', 5, '30626831', 'w3DUCeHpNsKMh1oxc0ILZFT9SPWGn8ul');
INSERT INTO `uvclinic_user` VALUES (8, '123', '', '', '男', '', '', 2, 'on', 'c4ca4238a0b923820dcc509a6f75849b', '2021-02-09 16:46:01', '2021-02-23 13:51:26', '2021-02-23 13:51:26', '127.0.0.1', '2021-02-09 16:46:50', 1, NULL, NULL);
INSERT INTO `uvclinic_user` VALUES (9, '1', '1', '1@11.com', '男', '2021-02-18', '1', 2, 'on', 'c4ca4238a0b923820dcc509a6f75849b', '2021-02-18 09:16:49', '2021-02-23 13:51:18', '2021-02-23 13:51:18', '127.0.0.1', NULL, 0, NULL, NULL);
INSERT INTO `uvclinic_user` VALUES (10, 'renshi', '人事', 'renshi@qq.com', '女', '2021-02-23', '', 11, 'on', 'c4ca4238a0b923820dcc509a6f75849b', '2021-02-23 12:40:59', '2021-02-23 14:06:29', NULL, '127.0.0.1', '2021-02-23 12:41:07', 1, NULL, NULL);
INSERT INTO `uvclinic_user` VALUES (11, 'kpiuser', 'kpi考核员', '11@11.com', '男', '2021-02-26', '', 12, 'on', 'c4ca4238a0b923820dcc509a6f75849b', '2021-02-26 09:09:26', '2021-02-26 09:09:26', NULL, '127.0.0.1', '2021-02-26 09:09:34', 1, NULL, NULL);
INSERT INTO `uvclinic_user` VALUES (12, 'tian', '田', 'tian@qq.com', '男', '2021-03-10', '', 10, 'on', 'c4ca4238a0b923820dcc509a6f75849b', '2021-03-10 10:21:30', '2021-03-10 10:21:30', NULL, '127.0.0.1', NULL, 0, '97827453', 'Tt96wfdkpx7Nc52JA4laVBKrevmqYRID');

-- ----------------------------
-- Table structure for uvclinic_website
-- ----------------------------
DROP TABLE IF EXISTS `uvclinic_website`;
CREATE TABLE `uvclinic_website`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `copyright` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '配置信息' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of uvclinic_website
-- ----------------------------
INSERT INTO `uvclinic_website` VALUES (1, '网站名称', '域名', '标题', '关键字', '描述', 'copyright');

SET FOREIGN_KEY_CHECKS = 1;
