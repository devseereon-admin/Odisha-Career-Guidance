<style>
body{
    padding-bottom: 65px;
}
.footer-unicef-card {
    background-color: transparent;
    border: none;
    z-index: 999;
    overflow: hidden;
    position: fixed;
    right: 32%;
    left: 32%;
    bottom: 0px;
    text-align: center; /* Center the image within the div */
}

.footer-unicef-card img {
    max-width: 100%;
    height: auto; /* Ensure the image scales properly */
}

@media screen and (max-width: 768px) {
    .footer-unicef-card {
        left: 0; 
        right: 0;
        bottom: 0px;
        z-index: 999;
    }
}
</style>

<section>
    <div class="container">
        <div class="row">
            <div class="offset-3 col-md-6">
                <div class="footer-unicef-card">
                    <img src="img/In collaboration with UNICEF.png" alt="UNICEF Collaboration">
                </div>
            </div>
        </div>
    </div>
</section>
