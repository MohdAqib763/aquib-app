<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quotation</title>
</head>
<style type="text/css">
@media  print {
   
    .printable, .printable > * {
    display: none !important;
  }
}
</style>
<body style="margin:0px; padding:0px; font-family:Arial; font-size:11.5px; color:#484848; line-height:1.3em;">
<button class="printable" style="float:right;right:0;margin:35px;padding:6px 15px;position:fixed;" onclick="window.print()">Print</button>
<div style="width:600px; margin:auto; border:solid 1px #dddddd;">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="2" align="center" valign="middle" style="background:#f1f1f1; border:solid 1px #dddddd; border-left:none; border-right:none; padding:5px 0; font-size:18px; color:#000;"><strong>Quotation</strong><br />
    </tr>
    <tr>
      <td colspan="2" align="left" valign="middle" style="padding-left:5px; padding-right:5px; padding-top:10px;"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr width="54%" align="left" valign="middle">
      <td align="left" valign="top" style="padding-left:5px; padding-top:10px; padding-bottom:10px; border-bottom:solid 1px #ddd; border-top:solid 1px #ddd; border-right:solid 2px #ddd;">
      <strong>KALASH REFRIGERATION SERVICES</strong><br />
          Regi. Office address : Shop No. 1 Bhagyashree,<br /> 
          Appartment,Behind Ramdas Ztower,<br>Tirupati nagar,Garkheda.Parisar Aurangabad<br />
          <strong>GSTIN/UIN :</strong> 27AFWPJ5199Q1Z3<br />
          <strong>Phone No:</strong> 0240 2451931<br /></td>
          <td align="left" valign="top" style="padding-left:5px; padding-top:10px; padding-bottom:10px; border-bottom:solid 1px #ddd; border-top:solid 1px #ddd; border-right:solid 2px #ddd;">
          Quotation No:
         <strong><?php echo e($row->quote_no); ?></strong></td>
         <td align="left" valign="top" style="padding-left:5px; padding-top:10px; padding-bottom:10px; border-bottom:solid 1px #ddd; border-top:solid 1px #ddd; border-right:solid 2px #ddd;">
         Date
         <strong><?php echo e($row->date); ?></strong></td>
        </tr>
     
      </table></td>
    </tr>
    <tr>
      <td align="left" valign="top" style="padding-left:5px; padding-top:10px; padding-bottom:10px; >
      <strong style="font-size:15px;background:lightgrey;">CUSTOMER DETAILS</strong><br />
      <strong>Name :<strong><?php echo e($row->party_name); ?></strong><br />
      <strong>Address :<?php echo e($row->address); ?><br />
      <strong>City :<?php echo e($row->city); ?><br />
      <strong>Phone :<?php echo e($row->phone); ?><br />
      <strong>GSTIN/UIN :</strong> <?php echo e($row->gstin); ?><br />
      <strong>State Name :</strong><?php echo e($row->state); ?></td>
      <!-- <td align="left" valign="top" style="padding-right:5px; padding-top:10px; padding-bottom:10px; border-bottom:solid 1px #ddd; border-top:solid 1px #ddd; padding-left:7px;">
      <strong style="font-size:15px;background:lightgrey;">BANK DETAILS</strong><br />
      <strong>Bank Name :</strong> SBI Bank (CC A/C)<br />
        <strong>A/c No.			:</strong>31596854102<br />
        <strong>IFS Code	:</strong> SBIN00130130<br />
        <strong>Branch Address </strong><br />
       Aurangabad Branch</td> -->
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
          <?php 
              $percentage = $product->percentage;
              $half = ($percentage/2);
              
              ?>
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
            <?php
              $rate = $product->rate;
              $qty = $product->quantity;
              $QtyPrice = $qty * $rate;
              $discount = $product->discount;
              $afterPrice = $QtyPrice * ($discount /100 );
              $Disprice = $QtyPrice  - $afterPrice;
      
            ?>
            <td align="center" valign="top"><?php if( $product->discount != ""){
              echo $Disprice; 
            }else{ echo $product->amount; } ?><br />
            <br />
            <?php
             $price = $product->amount;
             $gst = 9;
             $PercentPrice = ($gst / 100) * $price;
            ?>
            <strong></strong></td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td height="20" align="right" valign="middle"><strong>Total Amount &nbsp; </strong></td>
            <td align="left" valign="middle">&nbsp;</td>
            <td align="center" valign="middle"><strong></strong></td>
            <td align="left" valign="middle">&nbsp;</td>
            <td align="left" valign="middle">&nbsp;</td>
            <td align="left" valign="middle">&nbsp;  </td>
            <?php
            //  $gst = 18;
            //  $tax_amount = $row->grand_total;
            //  $total_amount = ($gst/100)  * $tax_amount;
            //  $grand_total = $tax_amount + $total_amount;
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
        <tr>
          <td height="20" align="left" valign="middle">&nbsp;<?php echo e($product->hsn_code); ?></td>
          <?php
              $rate = $product->rate;
              $qty = $product->quantity;
              $QtyPrice = $qty * $rate;
              $discount = $product->discount;
              $afterPrice = $QtyPrice * ($discount /100 );
              $Disprice = $QtyPrice  - $afterPrice;
      
              $gst = 18;
              $totaValue = $Disprice * ( $gst/ 100);
              $TaxToal = $totaValue + $Disprice;
      
            ?>
          <td align="center" valign="middle"><?php if( $product->discount != ""){
              echo $Disprice; 
            }else{ echo $product->amount; } ?></td>
          <td align="center" valign="middle"><?php echo $half; ?> %</td>
          <?php 
          if($product->discount != ""){
            $percent = $product->amount;
            $taxes = ($half/100) * $Disprice; 
       
            $plus+= $taxes;
          }else{
            $percent = $product->amount;
            $taxes = ($half/100) * $percent; 
       
            $plus+= $taxes;
          }
         
        
          
          ?>
          <td align="center" valign="middle"><?php echo $taxes?></td>
          <td align="center" valign="middle"><?php echo $half; ?> %</td>
          <td align="center" valign="middle"><?php echo $taxes?></td>
          <?php 
          $gst = 18;
          $amount = $product->taxable_value;
          $tx = ($gst/100) * $amount;
          $add = $amount + $tx;
          $sum+= $add;
          ?>
          <td align="center" valign="middle"><?php echo $add; ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td height="20" align="right" valign="middle">&nbsp;<strong>Total Amount After tax</strong>&nbsp;</td>
          <td align="center" valign="middle"><strong><?php echo e($row->grand_total); ?></strong></td>
          <td align="center" valign="middle">&nbsp;</td>
          <td align="center" valign="middle"><strong><?php echo $plus?></strong></td>
          <td align="center" valign="middle">&nbsp;</td>
          <td align="center" valign="middle"><strong><?php echo $plus?></strong></td>
          <?php
              
          ?>
          <td align="center" valign="middle"><strong><?php echo $sum; ?></strong></td>
        </tr>
      
        <!-- <tr>
        <td height="100" align="right" valign="bottom">&nbsp;<strong>Total Payable Amount</strong>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <?php 
        $grand = $row->grand_total;
        $val = $grand + $sum;
     
        ?>
        <td height="100"  align="center" valign="bottom"><strong><?php  echo $val; ?></strong>&nbsp;</td>
        </tr> -->
        
      </table></td>
    </tr>
  
    <tr>
      <td align="left" valign="top" style="padding-left:5px; padding-top:7px; padding-bottom:7px; border-bottom:solid 1px #ddd; border-top:solid 1px #ddd;  "><strong>Terms & Conditions</strong><br />
        <br />
                <?php
              echo nl2br($row->terms_condition);
        ?>
       <br />
        </td>
    
    </tr>
    <tr>
    <td align="left" valign="top" style="padding-right:5px; padding-top:7px; padding-bottom:7px; border-bottom:solid 1px #ddd; border-top:solid 1px #ddd; padding-left:7px;"><strong>Company's Bank Details</strong><br />
        <strong>Bank Name :</strong> SBI Bank (CC A/C)<br />
        <strong>A/c No.			:</strong>31596854102<br />
        <strong>IFS Code	:</strong> SBIN00130130<br />
        <strong>Branch Address </strong><br />
       Aurangabad Branch</td>
      <td colspan="2" align="right" valign="middle" style="padding:5px; border-bottom:solid 1px #DDD;"><strong>For Kalash Refrigertion & Services
          <br />Digitally Signed by
          Suresh laxmanrao Jadhav <br>
          <?php date_default_timezone_set('Asia/Kolkata');
          echo  date("Y/m/d"). '<br>';
                echo  date("h:i:sa");?>
      </strong>
        
      <div style=" padding-top:20px;">Authorised Signatory</div></td>
    </tr>
    <tr>
    </tr>
  </table>
</div>
</body>
</html><?php /**PATH C:\xampp\htdocs\Kalash\resources\views/Admin/quotationPdf.blade.php ENDPATH**/ ?>