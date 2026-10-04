import humanmade from '@humanmade/eslint-config';
import react from 'eslint-plugin-react';

export default [
	{ ignores: [ 'build/**', 'node_modules/**', 'vendor/**' ] },
	...humanmade,
	{
		// Mark components used only in JSX as "used" (HM's base config omits this).
		files: [ '**/*.{js,jsx}' ],
		plugins: { react },
		rules: { 'react/jsx-uses-vars': 'error' },
	},
];
