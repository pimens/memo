<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.1.1/pdfobject.min.js"></script>
<script>
    if (PDFObject.supportsPDFs) {
        console.log("Yay, this browser supports inline PDFs.");
    } else {
        console.log("Boo, inline PDFs are not supported by this browser");
    }
</script>

<h2>PDF --- 1</h2>
<object data="<?php echo base_url(); ?>data/xx.pdf" type=
"application/pdf" style="width:100%;height:1200px;">alt : <a href=
"<?php echo base_url(); ?>data/xx.pdf">example</a></object>

<h2>PDF --- 2</h2>
<object data="<?php echo base_url(); ?>Ad/pdf" type=
"application/pdf" style="width:100%;height:1200px;">alt : <a href=
"<?php echo base_url(); ?>data/xx.pdf">example</a></object> 
