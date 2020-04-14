import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link,
    useRouteMatch,
    useParams,
    useHistory,
    useLocation
} from "react-router-dom";
import { useState, useEffect } from 'react';
import ErrorBoundary from '../../Error/ErrorBoundary';
import { useForm } from 'react-hook-form';
import { Button, Input } from '../../Form/Form';

export default function LogIn(props)
{
    let location = useLocation();
    let history = useHistory();
    const { register, handleSubmit, errors } = useForm();
    const [disabled, setDisabled] = useState(false);
  
    function onSubmit(data) {
        setDisabled(true);
        axios.post('/login', {
            username: data.username,
            email: data.email,
            password: data.password
          })
          .then(function (response) {
            let data = JSON.parse(response.data.user);
            let message = { type: 'success', text: `Welcome ${data.username}!`}
            data = Object.assign(data, {message: message});
            props.userDispatch({type: 'login', payload: data});
            // To do: display welcome message
            //setDisabled(false); line remove because we can't perform an update state in unmounted component
            history.replace('/');
          })
          .catch(function (error) {
            console.log('LoginError', error);
            setDisabled(false);
        });
    }

    useEffect(() => {});

    return (
        <>
            <ErrorBoundary>
                <h1 className="is-size-4 is-title-1">Log in</h1>
                <form id='signin-form' onSubmit={handleSubmit(onSubmit)} noValidate>
                    <div className="field">
                        <Input label='Email' name='email' leftIcon='true' register={register} errors={errors.email} register={register} disabled={disabled}
                            validations={ { required: true, pattern: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ } }>
                            <span className="icon is-small is-left">
                                <i className="fas fa-envelope"></i>
                            </span>
                        </Input>
                    </div>
                    <div className="field">
                        <div className="control">
                            <Input label='Password' name='password' type='password' register={register} errors={errors.password} register={register} disabled={disabled}
                                validations={ { required: true }}/>
                        </div>
                    </div>
                    <div className="field">
                        <div className="control">
                            <label className="checkbox">
                                <input className='has-margin-right-7' type="checkbox" name='terms' disabled={disabled}/>
                                Remember me
                            </label>
                        </div>
                    </div>
                    <div className="is-justify-content-space-between has-row-reverse has-margin-top-4">
                        <Button buttonText='Log in' className='is-link' disabled={disabled}/>
                        <Link to="/">                    
                            <Button className='is-danger' buttonText='Return'/>
                        </Link>
                    </div>
                </form>
            </ErrorBoundary>
        </>
    );
}