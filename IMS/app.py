# Import statements
from flask import Flask, render_template, request, redirect, url_for, session, flash
from flask_sqlalchemy import SQLAlchemy
from flask_login import LoginManager, UserMixin, login_user, login_required, current_user, logout_user
from werkzeug.security import generate_password_hash, check_password_hash


# Initialize Flask app
local_server = True
app = Flask(__name__, template_folder='templates')
app.secret_key = 'nehakb'

# Initialize SQLAlchemy
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql://root:@localhost/insu'  # Adjust your database URI here
db = SQLAlchemy(app)

# Initialize Flask-Login
login_manager = LoginManager()
login_manager.init_app(app)
login_manager.login_view = 'login'

# Define User model
class User(UserMixin, db.Model):
    __tablename__ = 'registered'  # Set the table name explicitly
    id = db.Column(db.Integer, primary_key=True)
    username = db.Column(db.String(50))
    email = db.Column(db.String(50), unique=True)
    password = db.Column(db.String(1000))

# User loader function for Flask-Login
@login_manager.user_loader
def load_user(user_id):
    return User.query.get(int(user_id))

# Routes for index, health, home, auto, travel
@app.route('/')
def index():
    return render_template('index.html')

@app.route('/health')
def health():
    return render_template('health.html')

@app.route('/home')
def home():
    return render_template('home.html')

@app.route('/auto')
def auto():
    return render_template('auto.html')

@app.route('/travel')
def travel():
    return render_template('travel.html')

@app.route('/home_policy')
def home_policy():
    return render_template('home_policy.html')


@app.route('/health_policy')
def health_policy():
    return render_template('health_policy.html')


@app.route('/auto_policy')
def auto_policy():
    return render_template('auto_policy.html')


@app.route('/travel_policy')
def travel_policy():
    return render_template('travel_policy.html')


@app.route('/ticket')
def ticket():
    return render_template('ticket.html')


# Route for the login page
@app.route('/login', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        email = request.form.get('email')
        password = request.form.get('password')
        user = User.query.filter_by(email=email).first()

        if user and check_password_hash(user.password, password):
            login_user(user)
            return redirect(url_for('index'))  # Change redirect URL
        elif user:
            flash("Invalid credentials", "error")  # Use flash message for better feedback

    return render_template('login.html')

# Route for the registration page
@app.route('/register', methods=['GET', 'POST'])
def register():
    if request.method == 'POST':
        username = request.form.get('username')
        email = request.form.get('email')
        password = request.form.get('password')
        user = User.query.filter_by(email=email).first()

        if user:
            flash("Email already exists", "error")  # Use flash message for better feedback
            return render_template('register.html')
        
        hashed_password = generate_password_hash(password)
        new_user = User(username=username, email=email, password=hashed_password)
        db.session.add(new_user)
        db.session.commit()
        return redirect(url_for('login'))

    return render_template('register.html')

# Define the HomeInsurance model
class home_insu(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    insurance = db.Column(db.String(100), nullable=False)
    property_id = db.Column(db.String(100), nullable=False)
    year_built = db.Column(db.Integer, nullable=False)
    construction_type = db.Column(db.String(100), nullable=False)

    def __repr__(self):
        return '<home_insu %r>' % self.id


# Define the AutoInsurance model
class auto_insu(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    dl = db.Column(db.String(100), nullable=False)
    rc = db.Column(db.String(100), nullable=False)
    autoinsurance_type = db.Column(db.String(100), nullable=False)

    def __repr__(self):
        return '<auto_insu %r>' % self.id


# Define the TravelInsurance model
class travel_insu(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    duration = db.Column(db.String(100), nullable=False)
    destination = db.Column(db.String(100), nullable=False)
    rc = db.Column(db.String(100), nullable=False)
    travelinsurance_type = db.Column(db.String(100), nullable=False)
    mode_of_transport = db.Column(db.String(100), nullable=False)

    def __repr__(self):
        return '<travel_insu %r>' % self.id



# Define the HealthInsurance model
class health_insu(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    husband = db.Column(db.String(100), nullable=False)
    wife = db.Column(db.String(100), nullable=False)
    mother = db.Column(db.String(100), nullable=False)
    father = db.Column(db.String(100), nullable=False)
    kid1 = db.Column(db.String(100), nullable=False)
    kid2 = db.Column(db.String(100), nullable=False)
    kid3 = db.Column(db.String(100), nullable=False)
    kid4 = db.Column(db.String(100), nullable=False)
    kid5 = db.Column(db.String(100), nullable=False)

    def __repr__(self):
        return '<health_insu %r>' % self.id
    
    
    
# Define the TravelInsurance model
class ticket(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    name =db.Column(db.String(100), nullable=False)
    email = db.Column(db.String(100), nullable=False)
    query= db.Column(db.String(100000), nullable=False)

    def __repr__(self):
        return '<ticket %r>' % self.id










# Function to create tables

def create_tables():
    with app.app_context():
        db.create_all()

if __name__ == '__main__':
    with app.app_context():
        db.create_all()
    app.run(debug=True)











