import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link,
    useRouteMatch,
    useParams
} from "react-router-dom";
import { useState, useEffect } from 'react';
import SignInErrorBoundary from '../../Error/ErrorBoundary';
import { useForm } from 'react-hook-form'

export default function SignIn()
{
    const { register, handleSubmit, watch, errors } = useForm();

    function onSubmit(data) {
        console.log(data);
    }

    

    return (
        <>
            <SignInErrorBoundary>
                <h1 className="is-size-4 is-title-1">Sign in</h1>
                <form onSubmit={handleSubmit(onSubmit)} noValidate>
                    <div className="field">
                        <label className="label">Username</label>
                        <div className="control has-icons-left has-icons-right">
                            <input className={`input ${errors.username ? 'is-danger' : ''}`} type="text" name="username" ref={register({ required: true, minLength: 4, maxLength: 20 })} />
                            <span className="icon is-small is-left">
                                <i className="fas fa-user"></i>
                            </span>
                            {errors.username && errors.username.type === 'required' && <p className="help is-danger">The username is required</p>}
                            {errors.username && errors.username.type === 'minLength' && <p className="help is-danger">The username should have more than 3 characters</p>}
                            {errors.username && errors.username.type === 'maxLength' && <p className="help is-danger">The username should have less than 20 characters</p>}
                        </div>
                    </div>

                    <div className="field">
                        <label className="label">Email</label>
                        <div className="control has-icons-left has-icons-right">
                            <input className={`input ${errors.email ? 'is-danger' : ''}`} type="email" name="email" ref={register({ required: true, maxLength: 30, pattern: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ })} />
                            <span className="icon is-small is-left">
                                <i className="fas fa-envelope"></i>
                            </span>
                            {errors.email && errors.email.type === 'required' && <p className="help is-danger">The email is required</p>}
                            {errors.email && errors.email.type === 'pattern' && <p className="help is-danger">This email is not valid</p>}
                            {errors.email && errors.email.type === 'maxLength' && <p className="help is-danger">The email should have less than 30 characters</p>}
                        </div>
                    </div>

                    <div className="field">
                        <label className="label">Pokemon</label>
                        <div className="control">
                            <div className="select">
                                <select>
                                    <option>Select dropdown</option>
                                    <option>With options</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div className="field">
                        <div className="control">
                            <label className="checkbox">
                                <input className="has-margin-right-7" type="checkbox"/>
                                I agree to the <a href="#">terms and conditions</a>
                            </label>
                        </div>
                    </div>

                    <div className="field is-grouped">
                        <div className="control">
                            <button className="button is-link">Submit</button>
                        </div>
                    </div>              
                </form>
                <Link className="navbar-item" to="/">Return</Link>
            </SignInErrorBoundary>
        </>
    );
}