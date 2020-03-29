import json, uuid
from flask import Flask, url_for, render_template, request, Response, jsonify
from flask_sqlalchemy import SQLAlchemy

import provider
import company

app = Flask(__name__)
app.config["SQLALCHEMY_DATABASE_URI"] = "sqlite:///../../database/company.db"
app.config["SQLALCHEMY_TRACK_MODIFICATIONS"] = False

setup = provider.provider.setup()
db = SQLAlchemy(app)

def _entity_factory(key):    
    table = setup[key][1]
    pk = setup[key][2]
    return company.entity(db, table, pk)


@app.route("/", methods=["GET"])
def get_index():
    r = Response("It works!", status=200, mimetype="text/plain")
    return r


@app.route("/cruds", methods=["GET"])
def get_cruds():
    r = Response(json.dumps(setup), status=200, mimetype="application/json")
    return r

@app.route("/crud/<entity>/list", methods=["GET"])
def get_entity(entity):
    e = _entity_factory(entity)
    r = Response(json.dumps(e.list()), status=200, mimetype="application/json")
    return r


@app.route("/crud/<entity>/details/<id>", methods=["GET"])
def get_entity_details(entity, id):
    e = _entity_factory(entity)
    r = Response(json.dumps(e.details(id)), status=200, mimetype="application/json")
    return r


@app.route("/crud/<entity>/update", methods=["POST"])
def post_entity_update(entity):
    e = _entity_factory(entity)
    r = Response(json.dumps(e.update(request.form)), status=200, mimetype="application/json")
    return r


if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000, debug=True)
