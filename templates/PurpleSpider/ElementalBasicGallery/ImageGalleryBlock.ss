<div class="container">
    <div class="row">
        <div class="col">
            <% if $Title && $ShowTitle %>
                <h2>$Title</h2>
            <% end_if %>
            <% if PhotoGalleryImages %>
                <div class="row">
                    <% loop PhotoGalleryImages %>
                        <div class="col-6 col-md-4 col-lg-3 p-2 m-0">
                            <a data-fancybox="gallery" data-caption="$Title" href="$Image.FitMax(2400,2400).URL"><img src="$Image.Fill(400,400).URL" /></a>
                        </div>
                    <% end_loop %>
                </div>
            <% end_if %>
        </div>
    </div>
</div>