<?
$path ='./';
$jpage = 'regis';
include('header.php');
?>
<div id="pagewi">

<div id="regisname">
<h2 style="margin-bottom:3px"><b>��͡������������� �����Է���㹡���Ѻ�ҧ��Ţͧ��ҹ</b></h2>
<span style="color:#FF0000; font-size:11px; display:block; margin-bottom:20px">��سҡ�͡��������ǹ������ú �Ӥѭ�ҡ!</span>
<label>���ͨ�ԧ :</label><span><input type="text" name="firstname" maxlength="60" value="" /></span>
<label>���ʡ�� :</label><span><input type="text" name="surname" maxlength="60" value="" /></span>
<label>����ҡ�� :</label><span><input type="text" name="aliasname" maxlength="60" value="" /></span>
<label>������� :</label><span><input type="text" name="telephone" maxlength="60" value="" /></span>
</div>

<div class="warn">
��Ǩ�ͺ�����ŷ������ա����
</div>

<div id="regis">
<h2><b>��鹵͹��� 1 : ���������ͧ�鹢ͧ����ͧ���</b></h2>

<div class="divstep">
<label>1.1 ������</label><span class="onin"><b style="color:#f05070; font-size:14px;">Jamsai Love Series</b></span>
</div>

<div class="divstep">
<label>1.2 ��������ͧ</label>
<span class="onin">
��������ͧ�����
</span>
</div>

<div class="divstep">
<label class="laflo">1.3 �й�����ͧ����</label>
<span class="onin">
�������й�����ͧ��� ������
</span>
</div>

<div class="divstep">
<label class="laflo">1.4 �ٻ�Ҿ</label>
<span class="onin">
<img src="/jamsai/image/img.gif" class="myp" />
</span>
</div>

<div class="divstep">
<label style="width:auto">1.5 ����ͧ��� / �ç����ͧ������</label>
<div class="showcont">
����ͧ��� �ç����ͧ������ �ͧ����ͧ����觹��
</div>
</div>

<h2><b>��鹵͹��� 2 : �������ҵ͹��� 1</b></h2>

<div class="divstep">
<label>2.1 ���͵͹��� 1</label>
<span class="onin">
���͵͹��� 1 �硴�
</span>
</div>

<div class="divstep">
<label style="width:auto">2.2 �����ҵ͹��� 1</label>
<div class="showcont">
�����ҵ͹��� 1 ������
</div>
</div>

<div class="warn" style="font-size:30px;">
��سҵ�Ǩ�ͺ���ա�͹��<br />
�����������������ö�����
</div>

<div class="btnsubmit">
<input name="Submit" type="submit" id="step1" value="��Ѻ����" />
<input name="Submit" type="submit" id="sendcont" value="�觼ŧҹ" />
</div>

</div>
</div>

<?
include('footer.php');
?>