<?
$path ='./';
$jpage = 'regis';
include('header.php');
?>
<div id="pagewi">

<div id="regisname">
<h2 style="margin-bottom:3px"><b>กรอกข้อมูลเพิ่มเติม เพื่อสิทธิ์ในการรับรางวัลของท่าน</b></h2>
<span style="color:#FF0000; font-size:11px; display:block; margin-bottom:20px">กรุณากรอกข้อมูลส่วนตัวให้ครบ สำคัญมาก!</span>
<label>ชื่อจริง :</label><span><input type="text" name="firstname" maxlength="60" value="" /></span>
<label>นามสกุล :</label><span><input type="text" name="surname" maxlength="60" value="" /></span>
<label>นามปากกา :</label><span><input type="text" name="aliasname" maxlength="60" value="" /></span>
<label>เบอร์โทรฯ :</label><span><input type="text" name="telephone" maxlength="60" value="" /></span>
</div>

<div class="warn">
ตรวจสอบข้อมูลทั้งหมดอีกครั้ง
</div>

<div id="regis">
<h2><b>ขั้นตอนที่ 1 : ข้อมูลเบื่องต้นของเรื่องนี้</b></h2>

<div class="divstep">
<label>1.1 ประเภท</label><span class="onin"><b style="color:#f05070; font-size:14px;">Jamsai Love Series</b></span>
</div>

<div class="divstep">
<label>1.2 ชื่อเรื่อง</label>
<span class="onin">
เชื่อเรื่องที่ส่ง
</span>
</div>

<div class="divstep">
<label class="laflo">1.3 แนะนำเรื่องสั้นๆ</label>
<span class="onin">
บทความแนะนำเรื่องสั้น ทั้งหมด
</span>
</div>

<div class="divstep">
<label class="laflo">1.4 รูปภาพ</label>
<span class="onin">
<img src="/jamsai/image/img.gif" class="myp" />
</span>
</div>

<div class="divstep">
<label style="width:auto">1.5 เรื่องย่อ / โครงเรื่องทั้งหมด</label>
<div class="showcont">
เรื่องย่อ โครงเรื่องทั้งหมด ของเรื่องที่ส่งนี้
</div>
</div>

<h2><b>ขั้นตอนที่ 2 : ส่งเนื้อหาตอนที่ 1</b></h2>

<div class="divstep">
<label>2.1 ชื่อตอนที่ 1</label>
<span class="onin">
ชื่อตอนที่ 1 เด็กดี
</span>
</div>

<div class="divstep">
<label style="width:auto">2.2 เนื้อหาตอนที่ 1</label>
<div class="showcont">
เนื้อหาตอนที่ 1 ทั้งหมด
</div>
</div>

<div class="warn" style="font-size:30px;">
กรุณาตรวจสอบให้ดีก่อนส่ง<br />
เพราะส่งแล้วไม่สามารถแก้ไขได้
</div>

<div class="btnsubmit">
<input name="Submit" type="submit" id="step1" value="กลับไปแก้ไข" />
<input name="Submit" type="submit" id="sendcont" value="ส่งผลงาน" />
</div>

</div>
</div>

<?
include('footer.php');
?>