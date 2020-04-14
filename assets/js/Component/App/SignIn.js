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
import { useState } from 'react';
import ErrorBoundary from '../../Error/ErrorBoundary';
import { useForm } from 'react-hook-form';
import { Button, Input } from '../../Form/Form';

export default function SignIn(props)
{
    let location = useLocation();
    let history = useHistory();
    const { register, handleSubmit, errors, getValues } = useForm();
    const [disabled, setDisabled] = useState(false);

    function onSubmit(data) {
        setDisabled(true);
        console.log('SignIn', data);
        axios.post('/register', {
            username: data.username,
            email: data.email,
            password: data.password
          })
          .then(function (response) {
            console.log(response);
            let message = { type: 'success', text: 'Congrats! You will receive an email to activate your account'}
            props.userDispatch({type: 'update', payload: {message: message}});
            history.replace('/');
          })
          .catch(function (error) {
            console.log(error);
            //setDisabled(false);
            // To do: display error message
        });
    }

    return (
        <>
            <ErrorBoundary>
                <h1 className="is-size-4 is-title-1">Sign in</h1>
                <form id='signin-form' onSubmit={handleSubmit(onSubmit)} noValidate>
                    <div className="field">
                        <Input label='Username' name='username' leftIcon='true' register={register} errors={errors.username} register={register} disabled={disabled}
                            validations={ {required: true, minLength: 4, maxLength: 20} }>
                            <span className="icon is-small is-left">
                                <i className="fas fa-user"></i>
                            </span>
                        </Input>
                    </div>
                    <div className="field">
                        <Input label='Email' name='email' leftIcon='true' register={register} errors={errors.email} register={register} disabled={disabled}
                            validations={ { required: true, maxLength: 100, pattern: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ } }>
                            <span className="icon is-small is-left">
                                <i className="fas fa-envelope"></i>
                            </span>
                        </Input>
                    </div>
                    <div className="field">
                        <div className="control">
                            <Input label='Password' name='password' type='password' register={register} errors={errors.password} register={register} disabled={disabled}
                                validations={ { required: true, minLength: 6, maxLength: 50 }}/>
                        </div>
                    </div>
                    <div className="field">
                        <div className="control">
                            <Input label='Repeat password' name='password2' type='password' register={register} errors={errors.password2} register={register} disabled={disabled}
                                validations={ { required: true, validate: (password2) => {
                                if(getValues().password === password2) return true;
                                else return false;
                            } }}/>                        
                        </div>
                    </div>

                    <div className="field">
                        <div className="control">
                            <label className="checkbox">
                                <input className='has-margin-right-7' type="checkbox" name='terms' disabled={disabled}
                                    ref={register({ required: true })}/>
                                I agree to the <a href="#">terms and conditions</a>
                            </label>
                            {errors.terms && <p className="help is-danger">You must check the box</p>}
                        </div>
                    </div>
                    <div className="is-justify-content-space-between has-row-reverse has-margin-top-4">
                        <Button buttonText='Submit' className='is-link' disabled={disabled} />
                        <Link to="/">                    
                            <Button className='is-danger' buttonText='Return'/>
                        </Link>
                    </div>
                </form>

            </ErrorBoundary>
        </>
    );
}