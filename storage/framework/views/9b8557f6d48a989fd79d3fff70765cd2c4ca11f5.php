<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tax Invoice</title>
</head>
<style type="text/css">
@media  print {
   
    .printable, .printable > * {
    display: none !important;
  }
}
</style>

<body style="margin:0px; padding:0px; font-family:Arial; font-size:11.5px; color:#484848; line-height:1.3em;">
<button class="printable" style="float:right;right:0;margin:25px;padding:6px 15px;position:fixed;" onclick="window.print()">Print</button>
<div style="width:600px; margin:auto; border:solid 1px #dddddd;">

<div width="54%" align="center" valign="middle" style="text-align:center">
<strong>KALASH REFRIGERATION SERVICES</strong><br />
        Regi. Office address : Shop No. 1 Bhagyashree, 
        Appartment,Behind Ramdas Ztower,<br>Tirupati nagar,Garkheda.Parisar Aurangabad<br />
        <strong>GSTIN/UIN :</strong> 27AFWPJ5199Q1Z3<br />
        <strong>Phone No:</strong> 0240 2451931<br />
</div>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      
     
    </tr>
    <tr>
      <td colspan="2" align="left" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center" valign="middle" style="background:#f1f1f1; border:solid 1px #dddddd; border-left:none; border-right:none; padding:5px 0; font-size:18px; color:#000;"><strong>Tax Invoice</strong><br />
<span style="font-size:14px; color:#484848;">(Under Rule 31 Of CGST/MGST Act 2017)</span></td>
    </tr>
    <tr>
      <td colspan="2" align="left" valign="middle" style="padding-left:5px; padding-right:5px; padding-top:10px;"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="20" align="left" valign="middle">Invoice No </td>
          <td align="left" valign="middle"><strong><?php echo e($row->invoice_nuumber); ?></strong></td>
          <td align="left" valign="middle">PO No</td>
          <td align="left" valign="middle"><strong><?php echo e($row->po_number); ?></strong></td>
        </tr>
        <tr>
          <td height="20" align="left" valign="middle">Date</td>
          <td align="left" valign="middle"><strong><?php echo e($row->date); ?></strong></td>
          <td align="left" valign="middle">PO Date </td>
          <td align="left" valign="middle"><strong><?php echo e($row->po_date); ?></strong></td>
        </tr>
        <tr>
          <td height="20" align="left" valign="middle">Reverse Charge(Y/N) </td>
          <td align="left" valign="middle"><strong><?php echo e($row->reverse_charge); ?></strong></td>
          <td align="left" valign="middle">DC NO: </td>
          <td align="left" valign="middle"><strong><?php echo e($row->dc_no); ?></strong></td>
        </tr>
        <tr>
          <td height="20" align="left" valign="middle">State</td>
          <td align="left" valign="middle"><strong><?php echo e($row->state); ?></strong></td>
          <td align="left" valign="middle">Dc Dated</td>
          <td align="left" valign="middle"><strong><?php echo e($row->dc_date); ?></strong></td>
        </tr>
    
      </table></td>
    </tr>
    <tr>
      <td align="left" valign="top" style="padding-left:5px; padding-top:10px; padding-bottom:10px; border-bottom:solid 1px #ddd; border-top:solid 1px #ddd; border-right:solid 1px #ddd;"><strong>Bill To Party</strong><br />
      <strong>Name :<strong><?php echo e($bill->name); ?></strong><br />
      <strong>Address :<?php echo e($bill->address); ?><br />
        <strong>GSTIN/UIN :</strong> <?php echo e($bill->gstin); ?><br />
      <strong>State Name :</strong><?php echo e($bill->state); ?></td>
      <td align="left" valign="top" style="padding-right:5px; padding-top:10px; padding-bottom:10px; border-bottom:solid 1px #ddd; border-top:solid 1px #ddd; padding-left:7px;"><strong>Ship to Party<br />
      <strong>Name : <?php echo e($ship->name); ?> </strong><br />
      <strong>Address : <?php echo e($ship->address); ?><br />
        <strong>GSTIN/UIN :</strong>    <?php echo e($ship->gstin); ?><br />
      <strong>State Name :</strong>    <?php echo e($ship->state); ?> </td>
    </tr>
    <tr>
      <td colspan="2" align="left" valign="middle" style="padding:10px 5px;"><table width="100%" border="1" cellpadding="0" cellspacing="0" style="border:solid 1px #ddd;">
          <tr>
            <td width="27%" height="20" align="left" valign="middle"><strong> &nbsp;Items</strong></td>
            <td width="13%" align="center" valign="middle"><strong>HSN code</strong></td>
            <td width="17%" align="center" valign="middle"><strong>UOM</strong></td>
            <td width="10%" align="center" valign="middle"><strong>Qty</strong></td>
            <td width="8%" align="center" valign="middle"><strong>Rate</strong></td>
            <td width="9%" align="center" valign="middle"><strong>Disc. %</strong></td>
            <td width="16%" align="center" valign="middle"><strong>Amount</strong></td>
          </tr>
          <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td height="20" align="left" valign="top"> &nbsp;<?php echo e($product->item_name); ?><br />
            <br />
            <div style="text-align:right;"><strong>CGST <?php echo e($product->percentage); ?> %<br />
            SGST <?php echo e($product->percentage); ?> %</strong></div></td>
            <td align="center" valign="top"><?php echo e($product->hsn_code); ?></td>
            <td align="center" valign="top"><?php echo e($product->uom); ?> </td>
            <td align="center" valign="top"><?php echo e($product->quantity); ?></td>
            <td align="center" valign="top"><?php echo e($product->rate); ?></td>
            <td align="center" valign="top"><?php echo e($product->discount); ?></td>
        
            <td align="center" valign="top"><?php echo e($product->taxable_value); ?><br />
            <br />
         
            <strong><br />
            </strong></td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td height="20" align="right" valign="middle"><strong>Total Amount&nbsp; </strong></td>
            <td align="left" valign="middle">&nbsp;</td>
            <td align="center" valign="middle"><strong></strong></td>
            <td align="left" valign="middle">&nbsp;</td>
            <td align="left" valign="middle">&nbsp;</td>
            <td align="left" valign="middle">&nbsp;</td>
            <?php
                
                // $tax_amount = $row->grand_total;
                // $total_amount = ($gst/100)  * $tax_amount;
                // $grand_total = $tax_amount + $total_amount;
            
            ?>
           <td align="center" valign="middle"><strong><?php echo e($row->grand_total); ?></strong></td>
          </tr>
      </table></td>
    </tr>
    
    <tr>
      <td colspan="2" align="left" valign="middle" style="padding:10px 5px;"><table width="100%" border="1" cellpadding="0" cellspacing="0" style="border:solid 1px #ddd;">
        <tr>
          <td width="24%" rowspan="2" align="left" valign="middle"><strong>&nbsp;HSN Code</strong></td>
          <td width="14%" rowspan="2" align="center" valign="middle"><strong>Taxable<br />
            Value          </strong></td>
          <td height="28" colspan="2" align="center" valign="middle"><strong>CGST</strong></td>
          <td colspan="2" align="center" valign="middle"><strong>SGST </strong></td>
          <td width="12%" rowspan="2" align="center" valign="middle"><strong>Total Tax Amount</strong></td>
        </tr>
        <tr>
          <td width="11%" height="28" align="center" valign="middle"><strong>Rate</strong></td>
          <td width="15%" align="center" valign="middle"><strong>Amount</strong></td>
          <td width="9%" align="center" valign="middle"><strong>Rate</strong></td>
          <td width="15%" align="center" valign="middle"><strong>Amount</strong></td>
          </tr>
          <?php $sum = 0;?>
          <?php $plus = 0;?>
          <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php 
              $percentage = $product->percentage;
              $half = ($percentage/2);
              
              ?>
          <tr>
        <tr>
          <td height="20" align="center" valign="middle">&nbsp;<?php echo e($product->hsn_code); ?></td>
          <?php
               
      
            ?>
          <td align="center" valign="middle"><?php echo e($product->taxable_value); ?></td>
          <td align="center" valign="middle"><?php echo $half; ?> %</td>
          <?php 
         
          $TaxValue = $product->taxable_value;
          $taxes = ($half/100) * $TaxValue; 


          $addTax = $TaxValue * ($percentage/100);
          $TotalTax = $TaxValue + $addTax;



          $plus+= $taxes;
        
          
          ?>
          <td align="center" valign="middle"><?php echo $taxes; ?></td>
          <td align="center" valign="middle"><?php echo $half; ?>%</td>
          <td align="center" valign="middle"><?php echo $taxes; ?></td>
          <td align="center" valign="middle"><?php echo $TotalTax; ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td height="20" align="right" valign="middle">&nbsp;<strong>Total Amount Ater Tax</strong>&nbsp;</td>
          <td align="center" valign="middle"><strong></strong></td>
          <td align="center" valign="middle">&nbsp;</td>
          <td align="center" valign="middle"><strong><?php echo $plus; ?></strong></td>
          <td align="center" valign="middle">&nbsp;</td>
          <td align="center" valign="middle"><strong><?php echo $plus; ?></strong></td>
          <?php
              $tax = $product->percentage;
              $grand = $row->grand_total;
              $val = ($tax/100) * $grand;
              $GrandTotal = $val + $grand;
          ?>
          <td align="center" valign="middle"><strong><?php echo $GrandTotal; ?></strong></td>
        </tr>
        
          
      </table></td>
    </tr>
    <tr>
    <td height="20" align="right" valign="middle">&nbsp;<strong>Grand Total</strong>&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" style="padding-left:5px; padding-top:7px; padding-bottom:7px; border-bottom:solid 1px #ddd; border-top:solid 1px #ddd; border-right:solid 1px #ddd; "><br />
        <br />
       <br />
        </strong><img src="<?php echo e(url('public/img/qrcode.jpeg')); ?>" width="120px"></td>
      <td align="left" valign="top" style="padding-right:5px; padding-top:7px; padding-bottom:7px; border-bottom:solid 1px #ddd; border-top:solid 1px #ddd; padding-left:7px;"><strong>Company's Bank Details</strong><br />
        <strong>Bank Name :</strong> SBI Bank (CC A/C)<br />
        <strong>A/c No.			:</strong>31596854102<br />
        <strong>IFS Code	:</strong> SBIN00130130<br />
        <strong>Branch Address </strong><br />
       Aurangabad Branch</td>
    </tr>
    <tr>
      <td colspan="2" align="right" valign="middle" style="padding:5px; border-bottom:solid 1px #DDD;"><strong>For Kalash Refrigertion & Services
          <br />Digitally Signed by
          Suresh laxmanrao Jadhav <br>
          <?php date_default_timezone_set('Asia/Kolkata');
          echo  date("Y/m/d"). '<br>';
                echo  date("h:i:sa");?>
      </strong>
        
      <div style=" padding-top:20px;">Authorised Signatory</div></td>
    </tr>

  </table>
</div>
</body>
</html><?php /**PATH C:\xampp\htdocs\Kalash\resources\views/Admin/invoicepdf.blade.php ENDPATH**/ ?>