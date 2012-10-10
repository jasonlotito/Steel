<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:output method="xml" version="5.0" encoding="utf-8" indent="yes"
              standalone="yes" omit-xml-declaration="yes"/>

  <xsl:include href="Element.xsl"/>

  <xsl:template name="Checkbox">
    <!-- @todo Combine all inputs into a single template -->
    <xsl:param name="label"/>
    <xsl:param name="value"/>
    <xsl:param name="name"/>
    <xsl:param name="class"/>
    <xsl:param name="id"/>
    <xsl:param name="for"/>

    <xsl:choose>
      <xsl:when test="$id = ''">
        <xsl:variable name="setId">
          <xsl:text>form-</xsl:text>
          <xsl:value-of select="$name"/>
        </xsl:variable>
      </xsl:when>
      <xsl:otherwise>
        <xsl:variable name="setId" select="$id"/>
      </xsl:otherwise>
    </xsl:choose>

    <label class="control-label">

      <xsl:if test="$for != ''">
        <xsl:attribute name="for">
          <xsl:value-of select="$for"/>
        </xsl:attribute>
      </xsl:if>

      <xsl:value-of select="$label"/>

    </label>

    <div class="controls">

      <xsl:element name="input" use-attribute-sets="input-attributes">

        <xsl:attribute name="type">
          <xsl:text>checkbox</xsl:text>
        </xsl:attribute>

      </xsl:element>


      <xsl:choose>
        <xsl:when test="error = 1">
          <span class="help-inline">
            <strong>
              <xsl:choose>
                <xsl:when test="errorLabel != ''">
                  <xsl:value-of select="errorLabel"/>
                </xsl:when>
                <xsl:otherwise>
                  <xsl:text>Error:</xsl:text>
                </xsl:otherwise>
              </xsl:choose>
            </strong>
            <span class="error-message">
              <xsl:choose>
                <xsl:when test="errorMessage != ''">
                  <xsl:value-of select="errorMessage"/>
                </xsl:when>
                <xsl:otherwise>
                  <xsl:text>This element is required.</xsl:text>
                </xsl:otherwise>
              </xsl:choose>
            </span>
          </span>
        </xsl:when>
        <xsl:when test="description != ''">
          <span class="help-inline">
            <xsl:value-of select="description"/>
          </span>
        </xsl:when>
      </xsl:choose>
    </div>
  </xsl:template>

</xsl:stylesheet>
