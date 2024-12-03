<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* thanku page css  */

    .thankyouSectionWrapper {
        background-color: #f3f3f3;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        height: 100%;
        min-height: 100vh;
    }

    .thankyouSectionWrapper .secHeadingContent {
        max-width: 900px;
        background-color: #fff;
        text-align: center;
        padding: 50px;
        padding-bottom: 30px;
        border-radius: 20px;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.02);
    }
    .thankyouSectionWrapper .secHeadingContent img{
        width: 200px;
        margin: 0 auto;
        margin-bottom: 40px;
    }

    .thankyouSectionWrapper .secHeadingTitle {
        margin: 0;
        font-size: 50px;
        text-align: center;
        font-weight: 600;
    }

    .thankyouSectionWrapper .secContent {
        color: #9b9696;
        font-size: 17px;
        margin-top: 29px;
        line-height: 29px;
        max-width: 80%;
        margin: 0 auto;
        margin-top: 30px;
        margin-bottom: 40px;
    }

    .btnWrap a {
        background-color:var(--primary-color);
        border-color: var(--primary-color);
        font-weight: 600;
        transition: all .5s ease;
        color: #fff;
        text-decoration: none;
        padding: 14px;
        border-radius: 100px;
    }
    .contactUsLink{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 70px;
    }
    .contactUsLink a {
        color: #858585;
        text-decoration: none;
        font-weight: 500;
        margin-left: 5px;
    }

@media (max-width:767px){
     .thankyouSectionWrapper .secHeadingContent {
        padding: 30px;
     }
    .thankyouSectionWrapper .secHeadingContent img {
        width: 134px;
        margin: 0 auto;
        margin-bottom: 40px;
    }
    .thankyouSectionWrapper .secHeadingTitle {
        margin: 0;
        font-size: 30px;
        text-align: center;
        font-weight: 600;
    }
    .thankyouSectionWrapper .secContent{
        max-width: 100%;
    }
}
  </style>
</head>

<body>
    <div class="thankyouSectionWrapper">
        <div class="secHeadingContent">
            <img src="<?php echo base_url('uploads/thankyou_img.svg'); ?>" alt="thanku image" />
            <h2 class="secHeadingTitle">Thank You for <br /> Registering!</h2>
            <p class="secContent">Your Gurukul registration has been successfully submitted. We appreciate your time and effort in completing the form. Our team will review your information and get back to you shortly.</p>
            <div class="btnWrap">
                <a href="/login" class="btn btn-success btn-md" style="background-color:green;">Back to home</a>
            </div>
            <div class="contactUsLink">
                <p>If you have any issues</p> <a href="javascript:void(0);" class="btn-link">Contact Us.</a>
            </div>
        </div>
    </div>
</body>

</html>