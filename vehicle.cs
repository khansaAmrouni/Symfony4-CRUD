using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Vehicle
{
    #region Vehicle
    public class Vehicle
    {
        #region Member Variables
        protected int _id;
        protected string _type;
        protected string _model;
        protected string _capacity;
        protected string _color;
        protected DateTime _created_at;
        #endregion
        #region Constructors
        public Vehicle() { }
        public Vehicle(string type, string model, string capacity, string color, DateTime created_at)
        {
            this._type=type;
            this._model=model;
            this._capacity=capacity;
            this._color=color;
            this._created_at=created_at;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Type
        {
            get {return _type;}
            set {_type=value;}
        }
        public virtual string Model
        {
            get {return _model;}
            set {_model=value;}
        }
        public virtual string Capacity
        {
            get {return _capacity;}
            set {_capacity=value;}
        }
        public virtual string Color
        {
            get {return _color;}
            set {_color=value;}
        }
        public virtual DateTime Created_at
        {
            get {return _created_at;}
            set {_created_at=value;}
        }
        #endregion
    }
    #endregion
}