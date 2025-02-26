import React, {useState} from 'react';

// Components
import Register from '../components/Auth/Register';
import Login from '../components/Auth/Login';

// Main component
export default function ScreenAuth() {
	const [formType, setFormType] = useState('login');

	switch (formType) {
		case 'register':
			return (<Register changeForm={setFormType} />);
		case 'login':
		default:
			return (<Login changeForm={setFormType} />);
	}
}