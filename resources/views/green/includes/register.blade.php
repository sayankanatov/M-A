@if(Session::has('message'))
    <div role="alert" class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
        <i class="fa fa-check-circle"></i>{!! Session::get('message') !!}
    </div>
@endif
<div class="mo">
	<div class="content">
		<a href="#" id="show-modal"></a>
			<div class="modal-bg">
				<div class="modal">
					<div class="modal-close"></div>
					<div class="modal_heder">Регистрация</div>
					<div class="modal_subtitle">Выберите тип учетной записи</div>
					<section class="wrapper">
						<ul class="tabs">
							<li><a href="#tab1">Физическое лицо</a></li>
							<li><a href="#tab2">Юрист/адвокат</a></li>
							<li><a href="#tab3">Юридическая компания</a></li>
						</ul>
						<div class="clr"></div>
						<section class="block">
							<article id="tab1">
								@include('green.includes.register.user')
								@include('green.includes.register.social')
							</article>
							<article id="tab2">
								@include('green.includes.register.lawyer')
								@include('green.includes.register.social')
							</article>
							<article id="tab3">
								@include('green.includes.register.company')
								@include('green.includes.register.social')
							</article>
					</section>
				</section>
			</div>
		</div>
	</div>
</div>