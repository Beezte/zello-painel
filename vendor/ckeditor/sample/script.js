ClassicEditor
	.create( document.querySelector( '#corpoEmaill' ), {
		removePlugins: [ 'Heading', 'Title' ]

	} )
	.then( editor => {
		window.editor = editor;
	} )
	.catch( handleSampleError );

function handleSampleError( error ) {
	const issueUrl = 'https://github.com/ckeditor/ckeditor5/issues';

	const message = [
		'Oops, something went wrong!',
		`Please, report the following error on ${ issueUrl } with the build id "yf4tm7ng0kk6-yv6x9s6fjzaf" and the error stack trace:`
	].join( '\n' );

	console.error( message );
	console.error( error );
}
