import provider


class _cruder:
    db = None
    table = ""
    pk = ""

    def __init__(self, _db, _table, _pk):
        self.db = _db
        self.table = _table
        self.pk = _pk


class entity(_cruder):
    def __init__(self, _db, _table, _pk):
        _cruder.__init__(self, _db, _table, _pk)
    
    def list(self):
        list_sql = "SELECT * FROM `{0}`;".format(self.table)
        data = self.db.engine.execute(list_sql, [])
        return [dict(datum) for datum in data]
        
    def details(self, id):
        details_sql = f"SELECT * FROM `{self.table}` WHERE `{self.pk}`=? LIMIT 1;"
        details = self.db.engine.execute(details_sql, [id])
        return [dict(datum) for datum in details][0]
    
    def update(self, record={}):
        kv = ",".join(["`{0}`=:{1}".format(k, k) for k in record.keys()])
        #kv = ",".join(["`{k}`=:{k}" for k in record.keys()])
        update_sql = f"UPDATE `{self.table}` SET {kv} WHERE `{self.pk}`=:{self.pk} LIMIT 1;"
        details = self.db.engine.execute(update_sql, record)
        return True
