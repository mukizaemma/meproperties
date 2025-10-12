        <section class="main-banner-wrap2">

            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="main-banner-box2 wow slideInUp" data-wow-delay=".3s">
                            <div class="item-img">
                                <img src="{{ asset('storage/images/about') . $about->image1 }}" alt="banner" width="751" height="451">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-section-wrap1 motion-effects-wrap wow bounceInDown" data-wow-delay=".3s">

                            <h2 class="item-title"><a href="{{ route('propertySearch') }}">Find Your Accessible Homes For Rent</a></h2>
                            <form action="{{ route('propertySearch') }}" method="GET" class="rent-form">
                                <div class="form-check-box d-flex justify-content-between">
                                    <label class="checkbox-button checkbox-button-2">
                                        <input type="radio" class="checkbox-button__input" name="status" value="For Rent">
                                        <span class="checkbox-button__control checkbox-button__control-2"></span>
                                        <span class="checkbox-button__label checkbox-button__label-2">For Rent</span>
                                    </label>

                                    <label class="checkbox-button checkbox-button-2">
                                        <input type="radio" class="checkbox-button__input" name="status" value="For Buy">
                                        <span class="checkbox-button__control checkbox-button__control-2"></span>
                                        <span class="checkbox-button__label checkbox-button__label-2">For Buy</span>
                                    </label>

                                    <label class="checkbox-button checkbox-button-2">
                                        <input type="radio" class="checkbox-button__input" name="status" value="For Sell">
                                        <span class="checkbox-button__control checkbox-button__control-2"></span>
                                        <span class="checkbox-button__label checkbox-button__label-2">For Sell</span>
                                    </label>
                                </div>

                                <div class="select-area mt-3">
                                    <div class="row gutters-15">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="price-content">
                                                <select name="category" id="category" class="form-control">
                                                    <option value="Category">Category</option>
                                                    <option value="Residential">Residential</option>
                                                    <option value="Commercial">Commercial</option>
                                                    <option value="Land">Land</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="price-content">
                                                <select name="city" id="city" class="form-control">
                                                <option value="Arua">Arua</option>
                                                <option value="Entebbe">Entebbe</option>
                                                <option value="Fort Portal">Fort Portal</option>
                                                <option value="Gulu">Gulu</option>
                                                <option value="Hoima">Hoima</option>
                                                <option value="Jinja">Jinja</option>
                                                <option value="Kabale">Kabale</option>
                                                <option value="Kampala">Kampala</option>
                                                <option value="Masaka">Masaka</option>
                                                <option value="Mbale">Mbale</option>
                                                <option value="Mbarara">Mbarara</option>
                                                <option value="Mukono">Mukono</option>
                                                <option value="Mubende">Mubende</option>
                                                <option value="Wakiso">Wakiso</option>
                                                <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-grid mt-3">
                                    <div class="form-group">
                                        <div class="form-icon-area">
                                            <input type="text" name="location" class="form-control" placeholder="Property Location">
                                            <div class="form-icon"><i class="fas fa-map-marker-alt"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="form-group-button col-lg-12 text-center">
                                        <button type="submit" class="form-btn">Search Now</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>