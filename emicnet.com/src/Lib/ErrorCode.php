<?php

namespace jzweb\voip\emicnet\Lib;


/**
 *  封装相关错误码
 *
 * Class ErrorCode
 * @package jzweb\voip\emicnet\Lib
 */
class  ErrorCode
{

    //云平台错误码
    private static $errorList = [
        9999 => '未识别通话结束原因',
        1000 => '主叫挂断',
        1001 => '被叫挂断',
        1002 => '主叫无应答',
        1003 => '被叫无应答',
        1004 => '调用 API 通话取消接口结束通话',
        1005 => '通话时长超过设置的限定时长',
        1006 => '坐席主动流转',
        1007 => '坐席超时流转',
        1008 => '客户挂断（呼叫中心呼入）',
        1009 => '等待用户按键超时，总机主动挂断',
        1010 => '用户按键触发挂断，总机主动挂断',
        1011 => '用户按键错误次数超限，总机主动挂断',
        1012 => '语音通知发送完成，总机主动挂断',
        1013 => '主叫正在通话中',
        1014 => '主叫无法接通',
        1015 => '被叫正在通话中',
        1016 => '被叫无法接通',
        1017 => '没有找到外呼的总机号码',
        1018 => '总机停机',
        1019 => '无外呼权限',
        1020 => '工作时间限制',
        1021 => '企业内部错误',
        1022 => '呼叫频次限制（上海，单位时间内呼叫同一移动号码有次数限制）',
        1023 => '企业关联服务不存在（属于企业内部错误）',
        1024 => '企业关联的服务错误（属于企业内部错误）',
        1025 => '内线互拨不支持监控',
        1026 => '振铃呼损（坐席振铃时客户挂断）',
        1027 => '监控强拆',
        1028 => 'SIP 话机没有配置',
        1029 => 'SIP 话机未登陆',
        1030 => '主叫关机',
        1031 => '被叫关机',
        1032 => '主叫开通联通秘书',
        1033 => '被叫开通联通秘书',
        1034 => '主叫空号',
        1035 => '被叫空号',
        1036 => '主叫拒接',
        1037 => '被叫拒接',
        1038 => '主叫欠费（待识别）',
        1039 => '被叫欠费（待识别）',
        1040 => '主叫停机（待识别）',
        1041 => '被叫停机（待识别）',
        1042 => '主叫受限（待识别）',
        1043 => '被叫受限（待识别）',
        1044 => '主叫不在服务区（待识别）',
        1045 => '被叫不在服务区（待识别）',
        1046 => '主叫网络忙（待识别）',
        1047 => '被叫网络忙（待识别）',
        1048 => '呼叫主叫的总机欠费（待识别）',
        1049 => '呼叫被叫的总机欠费（待识别）',
        1100 => '呼叫主叫的总机停机（待识别）',
        1101 => '呼叫被叫的总机停机（待识别）',
        1102 => '呼叫主叫的总机国际长途限制（待识别）',
        1103 => '呼叫被叫的总机国际长途限制（待识别）',
        1104 => '总机呼叫主叫未加长途区号（待识别）',
        1105 => '总机呼叫被叫未加长途区号（待识别）',
        1106 => '主叫未开通语音服务',
        1107 => '被叫未开通语音服务',
        1108 => '主叫来电提醒',
        1109 => '被叫来电提醒',
        1110 => '菜单呼损',
        1111 => '排队放弃',
        1200 => '主叫线路错误',
        1201 => '被叫线路错误',
        1202 => '主叫挂断且录音时长过短',
        1203 => '被叫挂断且录音时长过短',
        1204 => '主叫未接通且录音时长过短',
        1205 => '被叫未接通且录音时长过短',
        1206 => '呼叫主叫超时且录音时长过短',
        1207 => '呼叫被叫超时且录音时长过短',
        1208 => '主叫超时未接',
        1209 => '被叫超时未接',
        1210 => '多呼功能,客户端系统挂断',
        1211 => '多呼功能,系统挂断',
        1050 => '坐席还没有签入',
        1051 => '坐席为非空闲状态',
        1052 => '非企业内坐席',
        1053 => '没有找到被叫',
        1054 => '查询被叫超时',
        1055 => '坐席工号格式错误',
        1056 => '坐席分机号格式错误',
        1057 => '获取企业用户信息失败',
        100000 => '目前尚不能提供的待开发功能',
        100001 => '内部数据库访问失败',
        100002 => '上传语音文件时创建目录失败',
        100003 => '上传语音文件时存储文件失败',
        100004 => '系统内存分配失败',
        100500 => '创建云总机企业分机用户失败',
        100501 => '更新云总机企业分机用户信息失败',
        100502 => '调用云总机 EP_PROFILE 接口失败',
        100503 => '获取云总机企业（用户）信息失败',
        100504 => '删除云总机企业分机失败',
        100505 => '与云总机的 HTTP 连接失败，或返回错误值',
        100506 => '向云总机获取通话录音失败',
        100507 => '向云总机申请直拨通话时，未返回总机号',
        100508 => '向云总机获取用户信息失败',
        100509 => '云总机创建技能组失败',
        100510 => '云总机删除技能组失败',
        100511 => '云总机添加技能组用户失败',
        100512 => '云总机删除技能组用户失败',
        100513 => '云总机呼叫中心接口返回错误',
        100514 => '云总机更新工作时间失败',
        100515 => '云总机删除工作时间失败',
        100516 => '录音文件不存在',
        100517 => '云总机访问录音授权服务器失败',
        100518 => '云总机企业不存在',
        100519 => '云总机没有分机号可分配',
        100520 => '云总机没有设置工作时间',
        100521 => '非法的工作时间',
        100522 => '云总机不存在该工作时间方案',
        100523 => '向呼叫中心企业签入失败',
        100524 => '未开启呼叫中心功能',
        100525 => 'VoIP 模式下，座席客户端（软电话）未注册',
        100526 => '被叫号码超过呼叫次数限制（开启呼出防骚扰）',
        100527 => '被叫非法（不能是本企业总机号）',
        100528 => '移动座席模式，不能设置状态或进行转接',
        100529 => '指定通话不存在',
        100530 => '座席无监控权限',
        100531 => '座席已经被监控',
        100532 => '企业分机号已被使用',
        100533 => '企业分机号不在有效分机号段内',
        100534 => '手机号码不符合策略，禁止添加',
        100535 => '创建的用户数目已经达到上限',
        100536 => '异地号码无法绑定企业用户',
        100537 => '非本网手机号无法绑定企业用户',
        100538 => '不允许电话直拨',
        100539 => '不允许网络通话',
        100540 => '不允许总机回拨',
        100541 => '呼叫分机号不存在',
        100542 => '电子邮件地址已经存在',
        100543 => '直线号码不属于用户所属企业',
        100544 => '添加直线号码失败',
        100545 => '没有权限设置呼叫方式',
        100546 => '分机号码位数不符合设置',
        100547 => '录音已经过期',
        100548 => '录音文件尚在上传',
        100549 => '没有找到父技能组',
        100550 => '企业无外线总机号码',
        100551 => '总机号码欠费',
        100552 => '外呼类型受限（本地，长途，国际长途）',
        100553 => '不在工作工作时间内',
        100554 => '分机通话分钟数已用完',
        100555 => '单位时间内拨打中国移动号码超过限制（上海联通）',
        100556 => '语音文件不存在',
        100557 => '语音文件不可用',
        100558 => '号码不在白名单内',
        100559 => '校验白名单失败（向运维查询号码是否在白名单失败）',
        100560 => '监控不支持内线互拨场景',
        100561 => '呼叫模式不匹配（不是呼叫中心企业）',
        100562 => '未绑定 sip 话机',
        100563 => 'sip 话机不在线',
        100564 => '创建外呼任务失败',
        100565 => '删除外呼任务失败',
        100566 => '更新外呼任务失败',
        100567 => '添加外呼任务的批次失败',
        100568 => '删除外呼任务的批次的任务号码失败',
        100569 => '查询外呼任务的批次的任务号码失败',
        100570 => '查询外呼任务的批次的状态失败',
        100571 => '启动外呼任务失败',
        100572 => '结束外呼任务失败',
        100573 => '暂停外呼任务失败',
        100574 => '监控外呼任务失败',
        100575 => '获取外呼任信息失败',
        100576 => '获取外呼任务列表失败',
        100577 => '获取批次信息失败',
        100578 => '获取批次列表失败',
        100579 => '没有找到技能组',
        100580 => '没有该外呼任务',
        100581 => '企业未开启',
        100582 => '缺少任务的批次 id',
        100583 => '没有任务号码（外呼任务中的客户号码）',
        100584 => '任务启动时间不在企业的工作时间范围内',
        100585 => '非进行中的任务不允许暂停',
        100586 => '外呼任务名称不能为空',
        100587 => '外呼时间段必须要 08:00-20:00 之间',
        100588 => '外呼时间段不能超出企业工作时间范围',
        100589 => '外呼速率必须在 0.8-1.2 之间',
        100590 => '外呼任务名称已经存在',
        100591 => '未完成的任务数已经达到上限',
        100592 => '进行中或已完成的任务不允许该操作',
        100593 => '缺少任务 id',
        100594 => '进行中或正在导入号码的任务不允许删除',
        100595 => '已完成，进行中，正在导入号码的任务不允许启动',
        100596 => '未开始，已完成，正在导入号码的任务不允许结束',
        100597 => '非 SIP 分机的分机号码不能在 SIP 分机号段内',
        100598 => '当前任务不存在该批次',
        100599 => '进行中，已完成，正在导入号码的批次不允许删除任务号码',
        100600 => '任务名称格式错误',
        100601 => '坐席已经存在于其他未完成的任务中',
        100602 => '开始时间不能晚于结束时间',
        100603 => '启动或暂停或结束任务失败（无此操作）',
        100604 => '启动或暂停或结束任务失败（操作不能为空）',
        100605 => '无坐席参与该任务',
        100606 => '更新分机信息失败（callintype 不存在）',
        100607 => 'SIP 话机分机号码不存在',
        100608 => '临时坐席，在线坐席，号码不在白名单中的坐席不能参与批量外呼任务',
        100609 => '缺少用户 Id，分机号，手机号或者工号',
        100610 => '企业管理员用户名或密码错误',
        100611 => '不在批量外呼任务的外呼时间段内',
        100612 => '上传批次号码失败',
        100613 => '手机号码不能为企业的直线号码或总机号码',
        100614 => '回拨话机号码不能为企业的直线号码或总机号码',
        100615 => '获取验证码失败',
        100616 => '验证用户手机号码失败',
        100617 => '用户手机号码尚未验证通过',
        100618 => '用户手机号码改变，需重新验证',
        100619 => '用户手机号码已经验证通过',
        100620 => '暂时不允许重新获取验证码',
        100621 => '验证码已经过期',
        100622 => '生成验证码失败',
        100623 => '针对该用户，尚未生成过验证码',
        100624 => '验证码格式错误',
        100625 => '验证次数超过限制次数',
        100626 => '输入的验证码不正确',
        100627 => '座席已关停',
        100628 => '用户不在白名单内',
        100629 => '用户在黑名单中',
        100630 => '呼叫某用户次数超限（防骚扰机制）',
        100631 => '总机号码不可用',
        100632 => '密码长度错误（6-20 位）',
        100633 => '批量外呼上传语音文件失败',
        100634 => '座席名已存在',
        100635 => '批量外呼语音文件不存在',
        100636 => '批量外呼任务名称超长（20 个字符）',
        100637 => '预设外呼速率值错误（0.5-1.0）',
        100638 => '座席不存在',
        100639 => '当前不能重呼外呼任务',
        100640 => '任务数据去重出错',
        100641 => '企业呼叫次数超限',
        100642 => '号码在全网黑名单中',
        100643 => '服务器外呼数量超限',
        100644 => '该企业不支持多呼功能',
        100645 => '外呼被叫号码过多',
        101000 => 'HTTP 请求包头无 Authorization 参数',
        101001 => 'HTTP 请求包头无 Content-Length 参数',
        101002 => 'Authorization 参数 Base64 解码失败',
        101003 => 'Authorization 参数解码后的格式错误，正确格式：<AccountSid:Timestamp>，注意以“:”隔开',
        101004 => 'Authorization 参数不包含认证账户 ID',
        101005 => 'Authorization 参数不包含时间戳',
        101006 => 'Authorization 参数的账户 ID 不正确（应与 URL 中的账户 ID 一致）',
        101007 => 'HTTP 请求使用的账号不存在',
        101008 => 'HTTP 请求使用的账号已关闭',
        101009 => 'HTTP 请求使用的账号已被锁定',
        101010 => 'HTTP 请求使用的账户尚未校验',
        101011 => 'HTTP 请求使用的子账户不存在',
        101012 => 'HTTP 请求的 sig 参数校验失败',
        101013 => 'HTTP 请求包体没有任何内容',
        101014 => 'HTTP 请求包体 XML 格式错误',
        101015 => 'HTTP 请求包体 XML 包中的功能名称错误',
        101016 => 'HTTP 请求包体 XML 包无任何有效字段',
        101017 => 'HTTP 请求包体 Json 格式错误',
        101018 => 'HTTP 请求包体 Json 包中的功能名称错误',
        101019 => 'HTTP 请求包体 Json 包无任何有效字段',
        101020 => 'HTTP 请求包体中缺少 AppId',
        101021 => 'HTTP 请求包体中缺少子账号 ID',
        101022 => 'HTTP 请求包体中的开始时间不正确',
        101023 => 'HTTP 请求包体中的结束时间不正确',
        101024 => 'HTTP 请求包体中缺少总机号码',
        101025 => 'HTTP 请求包体中的总机号码格式不正确',
        101026 => 'HTTP 请求包体中缺少企业管理员用户名',
        101027 => 'HTTP 请求包体中缺少企业管理员用户密码',
        101028 => 'HTTP 请求包体中的总机号码已被预置，无法使用',
        101029 => 'HTTP 请求包体中缺少用户绑定手机号码',
        101030 => 'HTTP 请求包体中手机号码格式错误',
        101031 => 'HTTP 请求包体中缺少直线号码',
        101032 => 'HTTP 请求包体中缺少被叫号码',
        101033 => 'HTTP 请求包体中被叫号码格式错误',
        101034 => 'HTTP 请求包体中被叫号码非法',
        101035 => 'HTTP 请求包体中主叫号码格式错误',
        101036 => 'HTTP 请求包体中主叫号码非法',
        101037 => 'HTTP 请求包体中无主叫号码',
        101038 => 'HTTP 请求包体中无验证码',
        101039 => 'HTTP 请求包体中验证码格式错误',
        101040 => 'HTTP 请求包体中缺少呼叫 ID（callId）',
        101041 => 'HTTP 请求包体的子账户 ID 非法',
        101042 => 'HTTP 请求包体中缺少语音 ID（voiceId）',
        101043 => 'HTTP 请求包体中的语音 ID 不正确',
        101044 => 'HTTP 请求包头的 Content-Length 值过大（应不大于1024X1024）',
        101045 => 'HTTP 请求包体中缺少 numberA',
        101046 => 'HTTP 请求包体中缺少 numberB',
        101047 => 'numberA 或 numberB 格式错误',
        101048 => '呼叫来显模式数值错误',
        101049 => '请求更新的子账户不属于本应用',
        101050 => '按键反馈字段（getFeedBack）不正确',
        101051 => '按键反馈模式字段（feedBackMode）不正确',
        101052 => '按键反馈键值范围不正确（keyRange）',
        101053 => '用户分机号未输入',
        101054 => '呼叫时间限制值格式错误',
        101055 => 'HTTP 请求包中缺少语音文本内容（或为空）',
        101056 => 'HTTP 请求包中的语音文本 Id 格式错误',
        101057 => 'HTTP 请求包中无模板参数',
        101058 => 'HTTP 请求包中的用户工号（座席工号）格式错误',
        101059 => 'HTTP 请求包中的父技能组 ID 格式错误（必须是数字）',
        101060 => 'HTTP 请求包中无技能组名称',
        101061 => 'HTTP 请求包中无技能组 ID',
        101062 => 'HTTP 请求包中的技能组 ID 格式错误（必须是数字）',
        101063 => 'HTTP 请求包中无座席工号',
        101064 => 'HTTP 请求包中的座席模式值非法',
        101065 => 'HTTP 请求包中的座席状态值非法',
        101066 => 'HTTP 请求包中无转接对象',
        101067 => '座席签入时，HTTP 请求包中无设备号码',
        101068 => '查询用户时未输入手机号或直线号码',
        101069 => '按键反馈提示播放次数设置数值非法',
        101070 => '按键反馈等待输入时间数值非法',
        101071 => '座席签入接口，输入的 deviceNumber 无效',
        101072 => '更新密码接口，未输入新密码',
        101073 => '密码长度非法',
        101074 => '密码中未包含数字',
        101075 => '密码中未包含字母',
        101076 => '密码中包含非法字符',
        101077 => '呼出限制接口未输入限制类型',
        101078 => '呼出限制接口限制类型错误',
        101079 => '呼出限制接口日限制值超出范围',
        101080 => '呼出限制接口周限制值超出范围',
        101081 => '呼出限制接口月限制值超出范围',
        101082 => 'HTTP 请求包中缺少短信签名',
        101083 => '短信签名不符合规范（3-8 个 UTF-8 字符）',
        101084 => 'HTTP 请求包中缺少签名类型字段',
        101085 => '签名类型值不正确',
        101086 => 'HTTP 请求包中缺少签名 ID',
        101087 => '签名 ID 无效（必须是数字）',
        101088 => 'HTTP 请求包中缺少短信模板 ID',
        101089 => '短信模板 ID 无效（必须是数字）',
        101090 => '短信模板文本类型错误',
        101091 => 'HTTP 请求包中缺少短信模板内容',
        101092 => '短信模板内容不符合规范',
        101093 => 'HTTP 请求包中缺少短信发送目标手机号',
        101094 => '短信发送目标手机号非法',
        101095 => 'HTTP 请求包中缺少短信发送模板参数',
        101096 => '短信发送模板参数不正确',
        101097 => '短信定时发送时间格式不正确',
        101098 => 'HTTP 请求包中缺少短信验证码参数',
        101099 => '短信验证码参数无效（4-8 位数字）',
        101100 => '短信模板参数非法',
        101101 => '短信模板参数过多',
        101102 => '缺少短信模板参数',
        101103 => '传入参数个数与实际短信模板参数个数不相同',
        101104 => '短信模板内容非法（长度太长或编码格式不正确）',
        101105 => '验证码短信模板中缺少 vc 变量',
        101106 => '验证码短信模板的 vc 变量过多',
        101107 => '短信模板类型错误',
        101108 => '短信发送目标号码数量过多（超过 10 个）',
        101109 => '被叫号码重复（多被叫情况下）',
        101110 => '配置虚拟号码时，未输入总机号',
        101111 => '配置虚拟号码时，输入的总机号码格式错误',
        101112 => '有效期值格式错误',
        101113 => '企业总机号不存在',
        101114 => '企业总机号码已被使用',
        101115 => '输入号码不是总机号或直线号',
        101116 => '没有星期参数',
        101117 => '没有开始时间参数',
        101118 => '没有结束时间参数',
        101119 => '星期参数值非法',
        101120 => '开始时间参数值非法',
        101121 => '结束时间参数值非法',
        101122 => '开始时间大于结束时间',
        101123 => '云总机不是呼叫中心企业',
        101124 => '语音模板参数非法',
        101125 => '语音模板组数与被叫数量不匹配',
        101126 => '语音通知模板参数变量数超过限制',
        101127 => '获取通话记录接口过于频繁',
        101128 => '获取通话记录接口最大条目数值非法（1-500）',
        101129 => '虚拟号码格式错误',
        101130 => '未输入虚拟号码对应的用户真实号码',
        101131 => '配对号码 ID 值格式错误',
        101132 => '虚拟号码 ID 值格式错误',
        101133 => '未输入配对号码列表',
        101134 => '未输入虚拟号码列表',
        101135 => '未输入有效期（maxAge）参数',
        101136 => '未输入服务号码',
        101137 => '输入服务号码非法（非数字）',
        101138 => '输入服务号码格式错误',
        101139 => '总机号码类型值错误',
        101140 => '输入分机号格式错误',
        101141 => 'HTTP 请求包中缺少话机类型参数',
        101142 => '话机类型参数格式错误',
        101143 => 'sip 话机号码格式错误',
        101144 => 'HTTP 请求包中缺少外呼任务名称参数',
        101145 => 'HTTP 请求包中缺少坐席工号参数',
        101146 => '外呼速率超过上限',
        101147 => '外呼速率低于下限',
        101148 => 'HTTP 请求包中缺少外呼任务 Id 参数',
        101149 => '外呼任务 Id 格式错误',
        101150 => 'HTTP 请求包中缺少外呼批次 Id 参数',
        101151 => 'HTTP 请求包中缺少任务号码参数',
        101152 => '任务号码数量超过上限',
        101153 => '外呼批次格式错误',
        101154 => '一次获取任务号码的数量格式错误',
        101155 => '获取任务号码的开始偏移值格式错误',
        101156 => '坐席工号的数量超过上限',
        101157 => '外呼速率格式错误',
        101158 => '任务或批次的状态参数格式错误',
        101159 => '任务或批次的状态参数超出范围',
        101160 => '查询列表限制数目参数格式错误',
        101161 => '自动接通参数格式错误',
        101162 => '自动接通参数超出范围',
        101163 => '表示一次最多获取列表条数的参数格式错误',
        101164 => '表示一次最多获取列表条数的参数超出取值范围',
        101165 => '表示一次最多获取批次号码的参数超出下限',
        101166 => '表示一次最多获取批次号码的参数格式错误',
        101167 => '智能路由不支持选择外显总机号码',
        101168 => 'HTTP 请求包中缺少 SIP 分机号码参数',
        101169 => '用户私有数据 userData 格式错误',
        101170 => '来源 IP 不在 IP 白名单内',
        101171 => '不可以指定该号码外呼',
        101172 => '帐号已存在',
        101173 => '日期信息不存在',
        101174 => '日期格式错误',
        101175 => '时间格式错误',
        101176 => '工作时间信息不存在',
        101177 => 'type 格式错误',
        101178 => '工作状态值格式错误',
        101179 => '总机号码配置开关格式错误',
        101180 => '总机号码配置开关值错误',
        101181 => '总机号码模式格式错误',
        101182 => '总机号码模式值错误',
        101183 => '总机号码外呼模式格式错误',
        101184 => '总机号码外呼模式值错误',
        101185 => '接听语音文件 id 格式错误',
        101186 => '语音文件不存在',
        101187 => '语音配置开关格式错误',
        101188 => '语音配置开关值错误',
        101189 => '任务去重出错',
        101190 => '未输入文本内容',
        101191 => '语音来源格式错误',
        101192 => '语音来源值错误',
        101193 => '工号和技能组 id 至少传一个',
        101194 => '总机号码列表格式有误',
        101195 => '被叫号码数量过多',
        101196 => '多呼功能已关闭',
        102000 => '账户所属省份错误',
        102001 => '账户关联企业错误',
        102002 => '应用 ID（appId）不存在',
        102003 => '应用 ID 与主账户不匹配',
        102004 => '应用状态为关闭，无法再提供服务',
        102005 => '子账户与应用 ID 不匹配',
        102006 => '请求包体中的子账户 ID 不存在',
        102007 => '子账户与应用 ID 不匹配',
        102008 => '子账户尚未关联或添加专用云总机企业',
        102009 => '总机号码找不到对应省份',
        102010 => '用户应用服务器连接失败',
        102011 => '主账户欠费',
        102012 => '用户当天调用接口次数已经超过设定值',
        102013 => '应用未上线，号码无呼叫权限',
        102014 => '应用尚未有子账户',
        102015 => '本应用没有该用户',
        102100 => '通话被用户应用服务器拒绝',
        102101 => '通话被叫数超限',
        102102 => '无法根据 callId 获得通话记录',
        102103 => '主叫号码无呼叫权限',
        102104 => 'callId 对应的呼叫记录与所属账户不匹配',
        102105 => '呼叫状态为失败',
        102106 => '呼叫状态尚不是挂断状态',
        102107 => '呼叫时长太短',
        102108 => '呼叫记录因通话失败或异常而无通话录音',
        102109 => '呼叫尚在录音中，无法获取录音',
        102110 => '本次呼叫没有录音',
        102111 => '用户无主账户呼叫权限',
        102112 => '没有呼叫该被叫的权限（即被叫不是分机绑定号码）',
        102113 => '账户没有取消通话的权限',
        102114 => '被叫日呼叫次数超过限制值',
        102115 => '被叫周呼叫次数超过限制值',
        102116 => '被叫月呼叫次数超过限制值',
        102117 => '企业单位时间内呼叫次数超过限制',
        102118 => '主账户没有可用资费包',
        102119 => '子账户没有可用资费包',
        102120 => '无法取消发送语音通知和语音验证码',
        102121 => '呼叫能力受限，无法呼叫',
        102300 => '请求必须使用子账户认证',
        102301 => '子账户所属云总机企业不存在',
        102302 => '子账户尚未绑定或添加云总机企业',
        102303 => '参数中的分机号码或密码错误，认证失败',
        102304 => '子账户已经绑定了云总机企业',
        102305 => '云总机企业已被添加到另一个子账户',
        102306 => '云总机企业是系统预置企业，无法删除',
        102307 => '用户手机号已经在云总机中注册',
        102308 => '直线号码已被其他用户使用',
        102309 => '输入的直线号码非法',
        102310 => '直线号码不属于用户所属企业',
        102311 => '用户手机号码尚未在企业中注册',
        102312 => '用户呼叫限制时间格式错误',
        102313 => '没有中间号码用于号码保护',
        102314 => '未找到输入的号码配对',
        102315 => '号码已经配对',
        102316 => '输入的云总机企业分机号不存在',
        102317 => '座席工号已被注册',
        102318 => '座席工号尚未注册',
        102319 => '座席已经加入了该技能组',
        102320 => '技能组尚不存在',
        102321 => '技能组组名已存在',
        102322 => '子账户绑定云总机属于通用企业，无法添加',
        102323 => '配对号码不存在',
        102324 => '配对号码 ID 不存在',
        102325 => '配对号码已经绑定',
        102326 => '虚拟号码不存在',
        102327 => '虚拟号码 ID 不存在',
        102328 => '虚拟号码已经存在',
        102329 => '虚拟号绑定号码已存在',
        102330 => '当前企业未找到此总机号',
        102331 => '虚拟号码不属于该企业',
        102332 => '配对号码不属于该企业',
        102333 => '关闭任务号码文件失败',
        102334 => '不是呼叫中心企业',
        102335 => '生成 json 请求文件失败',
        102336 => '被风控关停坐席不可以删除',
        102337 => '被风控关停坐席不可以编辑',
        102338 => '企业通话并发过大',
        102400 => '语音文件与应用 ID 不匹配',
        102401 => '语音文件已被另一个企业使用',
        102402 => '没有语音文本字段或语音文本长度为 0',
        102403 => '未找到语音通知要使用的语音文本',
        102404 => '语音文本长度超限',
        102405 => '语音文本总数超限',
        102406 => '语音文件个数超限',
        102407 => '语音文件尚未审核',
        102408 => '语音文件未审核通过',
        102409 => '语音文本或模板尚未审核',
        102410 => '语音文本或模板未审核通过',
        102411 => '输入的是否模板参数值非法',
        102412 => '语音模板参数数量为 0 或已经超限',
        102413 => '语音文本模板参数数量与模板不符',
        102414 => '语音文本模板，参数缺少或顺序有误',
        102415 => '模板参数长度超过规定值',
        102416 => '语音文件格式不符合规定',
        102417 => '文本转语音转换失败',
        102418 => '文本正在转语音过程中',
        102500 => '座席工号不存在',
        102501 => '呼叫中心内部错误',
        102502 => '当前座席忙',
        102503 => '呼叫中心不在工作时间',
        102504 => '当前座席不是回拨模式',
        102505 => '座席尚未签入',
        102506 => '获取外线号码失败',
        102507 => '云总机外呼失败',
        102511 => '通话已经结束或不存在',
        102512 => '座席不是班长，无监控权限',
        102513 => '座席不属于该技能组',
        102514 => '非新架构企业',
        102515 => '坐席不在线',
        102600 => '手机号码已经存在',
        102601 => '邮箱已经存在',
        102602 => '省份 id 错误',
        102603 => 'HTTP 请求包中缺少主账号 id 参数',
        102604 => '主账户不是超级账户',
        102605 => '认证 token 错误',
        102606 => 'HTTP 请求包中缺少应用名称参数',
        102607 => 'HTTP 请求包中缺少邮箱地址参数',
        102608 => 'HTTP 请求包中缺少省份 id 参数',
        102700 => '短信发送失败',
        102701 => '本应用添加短信签名数已达上限（默认 16）',
        102702 => '本应用添加短信模板数已达上限（默认 16）',
        102703 => '应用 ID 不匹配',
        102704 => '模板和签名类型不匹配',
        102705 => '模板尚未通过审核',
        102706 => '模板已经绑定签名',
        102707 => '短信发送超时',
        102708 => '签名不存在',
        102709 => '模板不存在',
        102710 => '模板尚未绑定签名',
        102711 => '签名重复',
        102712 => 'HTTP 请求包中缺少短信账号名参数',
        102713 => 'HTTP 请求包中缺少短信账号密码参数',
        102714 => '不支持该短信网关',
        102715 => '短信账号无效',
        102716 => '短信签名尚未审核通过',
        102720 => '漫道返回：短信参数错误',
        102721 => '漫道返回：短信内容过长',
        102722 => '漫道返回：同一号码发送内容相同',
    ];

    /**
     * 返回错误码对应的错误信息
     *
     * @param sgtring $errorCode
     * @return mixed|string
     */
    public static function GetErrorMsg($errorCode)
    {
        if (isset(self::$errorList[$errorCode])) {
            return self::$errorList[$errorCode];
        } else {
            return "未知错误";
        }
    }
}